<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criterion;
use App\Models\SubCriterion;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function index(Criterion $criterion, SubCriterion $subCriterion)
    {
        $criteria = Criterion::all();
        $subCriteria = SubCriterion::all();
        $alternatives = Alternative::all();
        return view('alternatif.get', compact('alternatives', 'criteria', 'subCriteria'));
    }

    public function create(Criterion $criterion, SubCriterion $subCriterion)
    {
        $criteria = Criterion::all();
        $subCriteria = SubCriterion::all();

        return view('alternatif.create', compact('criteria', 'subCriteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $criteriaList = Criterion::all();
        $criteriaData = [];

        foreach ($criteriaList as $criterion) {
            $subCriterionId = $request['sub_criterion_id_' . $criterion->id];

            if ($subCriterionId) {
                $criteriaData['criteria_id_' . $criterion->id] = $subCriterionId;
            }
        }

        // Merge the criteria data with the rest of the request data
        $data = array_merge($request->all(), $criteriaData);

        Alternative::create($data);

        return redirect()->route('alternatif.get')->with('success', 'Alternative created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Get the list of criteria dynamically
        $criteriaList = Criterion::all();

        // Prepare the criteria data for updating
        $criteriaData = [];
        foreach ($criteriaList as $criterion) {
            $criteriaData['criteria_id_' . $criterion->id] = $request['criteria_id_' . $criterion->id];
        }

        // Combine the criteria data with the rest of the request data
        $data = array_merge($request->all(), $criteriaData);

        $alternative = Alternative::findOrFail($id);
        $alternative->update($data);

        return redirect()->route('alternatif.get')->with('success', 'Alternative updated successfully.');
    }

    public function destroy($id)
    {
        $alternative = Alternative::findOrFail($id);
        $alternative->delete();

        return redirect()->route('alternatif.get')->with('success', 'Alternative deleted successfully.');
    }
}