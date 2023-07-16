<?php

use App\Http\Controllers\Controller;
use App\Models\Criterion;
use Illuminate\Http\Request;

class CriterionController extends Controller
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
    
        $matrix = array_fill(0, $n, array_fill(0, $n, 1));
    
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                $weight1 = $criterias[$i]->weight;
                $weight2 = $criterias[$j]->weight;
    
                $matrix[$i][$j] = $weight1 / $weight2;
                $matrix[$j][$i] = $weight2 / $weight1;
            }
        }
    
        $consistencyInfo = $this->checkConsistencyIndex($matrix);
        $ci = $consistencyInfo['ci'];
        $cr = $consistencyInfo['cr'];
        $consistency = $consistencyInfo['consistency'];
    
        return view('kriteria.calculate_ahp', compact('criterias', 'matrix', 'ci', 'cr', 'consistency'));
    }
}
