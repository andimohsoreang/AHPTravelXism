<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\SubCriterionController;
use App\Models\Criterion;
use App\Models\Alternative;
use App\Models\SubCriterion;
use Illuminate\Http\Request;

class CriterionController extends Controller
{
    public function index()
    {
        $criterias = Criterion::all();
        return view('kriteria.get', compact('criterias'));
    }

    public function create()
    {
        return view('kriteria.get');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'weight' => 'required|numeric',
        ]);

        $criterion = Criterion::create($request->all());

        return redirect()->route('kriteria.get', $criterion)->with('success', 'Criterion created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'weight' => 'required|numeric',
        ]);

        $criterion = Criterion::findOrFail($id);
        $criterion->update($request->all());

        return redirect()->route('kriteria.get')->with('success', 'Criterion updated successfully.');
    }

    public function destroy($id)
    {
        $criterion = Criterion::findOrFail($id);
        $criterion->delete();

        return redirect()->route('kriteria.get')->with('success', 'Criterion deleted successfully.');
    }

    public function calculateAhp()
    {
        $criterias = Criterion::all();
        $n = count($criterias);

        if ($n === 0) {
            return redirect()->route('kriteria.get')->with('error', 'No criteria available. Please add criteria first.');
        }

        $matrix = array();
        $criteriasIds = $criterias->pluck('id')->all();

        foreach ($criteriasIds as $id1) {
            $row = array();
            foreach ($criteriasIds as $id2) {
                $row[$id2] = 1;
            }
            $matrix[$id1] = $row;
        }

        $ci = 0;
        $sumColumn = array_fill_keys($criterias->pluck('id')->all(), 0); // Initialize sumColumn with keys from criteria IDs

        foreach ($criterias as $criterion) {
            foreach ($criterias as $c) {
                $sumColumn[$criterion->id] += $matrix[$criterion->id][$c->id];
            }
            $ci += $sumColumn[$criterion->id] !== 0 ? $sumColumn[$criterion->id] / ($n * $matrix[$criterion->id][$criterion->id]) : 0;
        }

        $ci = ($ci - $n) / ($n - 1);

        $ri = [0, 0, 0.58, 0.90, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49];

        $cr = $n > 0 ? $ci / $ri[$n] : 0;

        $tolerance = 0.1;
        $consistency = abs($cr) < $tolerance;

        $criterionWeights = [];
        foreach ($criterias as $criterion) {
            $criterionWeights[$criterion->id] = $criterion->weight;
        }

        $sumWeights = array_sum($criterionWeights);
        foreach ($criterionWeights as $criterionId => $weight) {
            $criterionWeights[$criterionId] = $weight / $sumWeights;
        }

        $finalWeights = [];
        foreach ($criterias as $criterion) {
            $sumWeightedMatrixColumn = 0;
            foreach ($criterias as $c) {
                $sumWeightedMatrixColumn += $matrix[$criterion->id][$c->id] * $criterionWeights[$c->id];
            }
            $finalWeights[$criterion->id] = $sumWeightedMatrixColumn;
        }
        $bestAlternative = null;
        $maxScore = 0;
        $alternatives = Alternative::all();

        foreach ($alternatives as $alternative) {
            $score = 0;

            foreach ($criterias as $criterion) {
                $subCriterias = SubCriterion::where('criterion_id', $criterion->id)->get();
                $nSub = count($subCriterias);

                $subMatrix = array_fill_keys($subCriterias->pluck('id')->all(), array_fill_keys($subCriterias->pluck('id')->all(), 1));
                $subWeights = [];

                foreach ($subCriterias as $subCriteria) {
                    $subWeights[$subCriteria->id] = $subCriteria->weight / $nSub;
                }

                for ($i = 0; $i < $nSub; $i++) {
                    for ($j = $i + 1; $j < $nSub; $j++) {
                        $subCriteriaId1 = $subCriterias[$i]->id;
                        $subCriteriaId2 = $subCriterias[$j]->id;

                        $subMatrix[$subCriteriaId1][$subCriteriaId2] = $subCriterias[$i]->weight / $subCriterias[$j]->weight;
                        $subMatrix[$subCriteriaId2][$subCriteriaId1] = $subCriterias[$j]->weight / $subCriterias[$i]->weight;
                    }

                    $score += $subWeights[$subCriterias[$i]->id] * $subMatrix[$subCriterias[$i]->id][$subCriterias[$i]->id] * $criterionWeights[$criterion->id];
                }
            }

            if ($score > $maxScore) {
                $maxScore = $score;
                $bestAlternative = $alternative;
            }
        }

        return view('kriteria.calculate_ahp', compact('criterias', 'matrix', 'ci', 'cr', 'consistency', 'bestAlternative', 'finalWeights'));
    }






}