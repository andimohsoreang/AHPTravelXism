<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\Criterion;
use App\Models\SubCriterion;
use App\Models\AlternativeCriteria;
use App\Http\Controllers\AhpController;

class AlternativeController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::all();
        $criteria = Criterion::all();
        $subCriteria = SubCriterion::all();

        return view('alternatif.get', compact('alternatives', 'criteria', 'subCriteria'));
    }

    public function store(Request $request)
    {
        $alternative = new Alternative();
        $alternative->name = $request->input('name');
        $alternative->save();

        $criteria = Criterion::all();
        foreach ($criteria as $criterion) {
            $criterionId = $criterion->id;
            $subCriterionId = $request->input('criteria_id_' . $criterionId);

            $alternativeCriterion = new AlternativeCriteria();
            $alternativeCriterion->alternative_id = $alternative->id;
            $alternativeCriterion->criterion_id = $criterionId;
            $alternativeCriterion->sub_criterion_id = $subCriterionId;
            $alternativeCriterion->save();
        }

        return redirect()->route('alternatif.get')->with('success', 'Alternative added successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validation (if needed)

        $alternative = Alternative::findOrFail($id);
        $alternative->name = $request->input('name');
        $alternative->save();

        $criteria = Criterion::all();
        foreach ($criteria as $criterion) {
            $criterionId = $criterion->id;
            $subCriterionId = $request->input('criteria_id_' . $criterionId);

            $alternativeCriterion = AlternativeCriteria::where('alternative_id', $id)
                ->where('criterion_id', $criterionId)
                ->first();

            if (!$alternativeCriterion) {
                $alternativeCriterion = new AlternativeCriteria();
                $alternativeCriterion->alternative_id = $id;
                $alternativeCriterion->criterion_id = $criterionId;
            }

            $alternativeCriterion->sub_criterion_id = $subCriterionId;
            $alternativeCriterion->save();
        }

        return redirect()->route('alternatif.index')->with('success', 'Alternative updated successfully.');
    }

    public function delete($id)
    {
        Alternative::destroy($id);

        return redirect()->route('alternatif.delete')->with('success', 'Alternative deleted successfully.');
    }

    public function rank()
    {
       
    }
}