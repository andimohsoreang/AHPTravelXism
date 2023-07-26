<?php

namespace App\Http\Controllers;

use App\Models\Criterion;
use App\Models\SubCriterion;
use Illuminate\Http\Request;

class SubCriterionController extends Controller
{
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
        ]);

        $subCriterion = SubCriterion::create($request->all());

        return redirect()->route('kriteria.getsub', $criterion)->with('success', 'Sub Criterion created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
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

    public function calculateSubCirterion()
    {
        $subCriterion = SubCriterion::all();
    }
}
