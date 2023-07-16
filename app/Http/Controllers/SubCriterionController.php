<?php

namespace App\Http\Controllers;

use App\Models\Criterion;
use App\Models\SubCriterion;
use Illuminate\Http\Request;

class SubCriterionController extends Controller
{

    private function calculateConsistencyIndex($matrix)
    {
        $n = count($matrix);
        $sumColumn = array_fill(0, $n, 0);

        for ($j = 0; $j < $n; $j++) {
            for ($i = 0; $i < $n; $i++) {
                $sumColumn[$j] += $matrix[$i][$j];
            }
        }

        $ci = 0;

        for ($j = 0; $j < $n; $j++) {
            $ci += $sumColumn[$j] / ($n * $matrix[$j][$j]);
        }

        $ci = ($ci - $n) / ($n - 1);
        return $ci;
    }

    private function calculateConsistencyRatio($ci, $n)
    {
        $ri = [0, 0, 0.58, 0.90, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49];
        $cr = $ci / $ri[$n];
        return $cr;
    }

    private function checkConsistencyIndex($matrix)
    {
        $n = count($matrix);

        $ci = $this->calculateConsistencyIndex($matrix);
        $cr = $this->calculateConsistencyRatio($ci, $n);

        $tolerance = 0.1;
        $consistency = abs($cr) < $tolerance;

        return [
            'ci' => $ci,
            'cr' => $cr,
            'consistency' => $consistency,
        ];
    }
    public function index(Criterion $criterion)
    {
        $criterias = Criterion::all();
        $subCriterias = SubCriterion::all();
        return view('kriteria.getsub', compact('criterias', 'subCriterias'));
    }

    public function create(Criterion $criterion)
    {
        $criteria = Criterion::all();
        return view('subcriteria.create', compact('criterion', 'criteria'));
    }

    public function store(Request $request, Criterion $criterion)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'weight' => 'required|numeric',
        ]);

        $subCriterion = SubCriterion::create($request->all());

        return redirect()->route('kriteria.getsub', $criterion)->with('success', 'Sub Criterion created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'weight' => 'required|numeric',
        ]);

        $subCriterion = SubCriterion::findOrFail($id);
        $subCriterion->update($request->all());

        return redirect()->route('kriteria.getsub', $subCriterion->criterion)->with('success', 'Sub Criterion updated successfully.');
    }

    public function destroy($id)
    {
        $subCriterion = SubCriterion::findOrFail($id);
        $criterion = $subCriterion->criterion;
        $subCriterion->delete();

        return redirect()->route('kriteria.getsub', $criterion)->with('success', 'Sub Criterion deleted successfully.');
    }

    public function calculateAhp()
    {
    $subCriterias = SubCriterion::all();

    $n = count($subCriterias);

    $matrix = array_fill(0, $n, array_fill(0, $n, 1));

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            $weight1 = $subCriterias[$i]->weight;
            $weight2 = $subCriterias[$j]->weight;

            $matrix[$i][$j] = $weight1 / $weight2;
            $matrix[$j][$i] = $weight2 / $weight1;
        }
    }

    $consistencyInfo = $this->checkConsistencyIndex($matrix);
    $ci = $consistencyInfo['ci'];
    $cr = $consistencyInfo['cr'];
    $consistency = $consistencyInfo['consistency'];

    return view('subcriteria.calculate_ahp', compact('subCriterias', 'matrix', 'ci', 'cr', 'consistency'));
    }

}
