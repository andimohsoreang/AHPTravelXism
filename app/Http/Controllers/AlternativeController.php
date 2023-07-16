<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::all();

        return view('alternatif.get', compact('alternatives'));
    }

    public function create()
    {
        return view('alternatif.get');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Alternative::create($request->all());

        return redirect()->route('alternatif.get')->with('success', 'Alternative created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $alternative = Alternative::findOrFail($id);
        $alternative->update($request->all());

        return redirect()->route('alternatif.get')->with('success', 'Alternative updated successfully.');
    }

    public function destroy($id)
    {
        $alternative = Alternative::findOrFail($id);
        $alternative->delete();

        return redirect()->route('alternatif.get')->with('success', 'Alternative deleted successfully.');
    }
}
