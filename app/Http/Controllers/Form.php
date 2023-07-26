<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\Criterion;
use App\Models\SubCriterion;
use App\Models\AlternativeCriteria;
use App\Http\Controllers\AHPController;

class Form extends Controller
{
    public function index()
    {
        $criteria = Criterion::all();
        $subCriteria = SubCriterion::all();
        $groupedSubCriteria = [];
        foreach ($subCriteria as $subCriterion) {
            $criteriaId = $subCriterion->criterion_id;
            if (!isset($groupedSubCriteria[$criteriaId])) {
                $groupedSubCriteria[$criteriaId] = [];
            }
            $groupedSubCriteria[$criteriaId][] = $subCriterion;
        }

        $CriteriaCount = count($criteria);
        $SubCriteriaCount = count($subCriteria);

        return view('userform.form', compact('criteria', 'subCriteria', 'groupedSubCriteria', 'CriteriaCount', 'SubCriteriaCount'));
    }
    public function submitForm(Request $request)
    {
        $formData = $request->all();
        $matriksKriteria = [];
        $ahpController = new AHPController;
        $alternative = Alternative::all();
        $alternativeKriteria = AlternativeCriteria::all();

        foreach ($formData as $key => $value) {
            if (str_contains($key, 'criteriaSelect')) {
                $two = substr($key, -2);
                $ini = str_split($two);
                $i = (int) $ini[0];
                $j = (int) $ini[1];
                $matriksKriteria[$i][$j] = (int) $value;
                $matriksKriteria[$j][$i] = (int) $value;
            }
        }


        for ($i = 0; $i < count($matriksKriteria); $i++) {
            $matriksKriteria[$i][$i] = 1;
        }
        $HasilKriteria = $ahpController->calculateAHP($matriksKriteria);

        $subMatriksKriteriaArray = [];

        foreach ($formData as $key => $value) {
            if (str_contains($key, 'subcriteria')) {
                $two = substr($key, -2);
                $first = substr($key, 0, 1);
                $ini = str_split($two);
                $i = (int) $ini[0];
                $j = (int) $ini[1];
                $subMatriksKriteriaArray[$first][$i][$j] = (int) $value;
                $subMatriksKriteriaArray[$first][$j][$i] = (int) $value;
            }
        }

        foreach ($subMatriksKriteriaArray as $index => $subMatrix) {
            for ($i = 0; $i < count($subMatrix); $i++) {
                $subMatriksKriteriaArray[$index][$i][$i] = 1;
            }
        }

        $subKirteriaArray = [];

        foreach ($subMatriksKriteriaArray as $index => $subKirteria) {
            $subKirteriaArray[$index] = $ahpController->calculateAHP($subKirteria);
        }

        $countAlternative = count($alternative);
        $allAlternative = [];
        for ($i = 1; $i <= $countAlternative; $i++) {
            $allAlternative[$i] = $alternativeCriteria = AlternativeCriteria::where('alternative_id', $i)->get();
        }


        $rankAlternative = [];
        $Kriteria_Prioritas = $HasilKriteria['priorities'];
        $SubKriteria_Prioritas = [];
        foreach($subKirteriaArray as $index => $subKirteria)
        {
            $SubKriteria_Prioritas[$index] = $subKirteria['priorities'];
        }

        dd($allAlternative);


        foreach ($allAlternative as $key_all => $alt) {
            foreach ($alt as $key => $items) {
                $rankAlternative[$key_all - 1][$key] = $SubKriteria_Prioritas[($items->criterion_id) - 1][($items->sub_criterion_id) - 1] * $Kriteria_Prioritas[($items->criterion_id) - 1];
            }
        }

        dd($rankAlternative);

        dd($SubKriteria_Prioritas);

        dd($alternativeKriteria);
        dd($subKirteriaArray);
        dd($HasilKriteria);
    }

}