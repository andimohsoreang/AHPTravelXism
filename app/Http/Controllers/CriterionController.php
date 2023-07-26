<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\SubCriterionController;
use APP\Models\AlternativeCriteria;
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
        ]);

        $criterion = Criterion::create($request->all());

        return redirect()->route('kriteria.get', $criterion)->with('success', 'Criterion created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
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

    public function calculateCriteria()
    {
      
    }
}