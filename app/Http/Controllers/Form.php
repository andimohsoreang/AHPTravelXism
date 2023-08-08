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
    private $dt;

    /**
     * Menampilkan halaman formulir dengan data kriteria dan subkriteria.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua data kriteria dan subkriteria dari database
        $criteria = Criterion::all();
        $subCriteria = SubCriterion::all();

        // Kelompokkan subkriteria berdasarkan kriteria yang dimiliki
        $groupedSubCriteria = [];
        foreach ($subCriteria as $subCriterion) {
            $criteriaId = $subCriterion->criterion_id;
            if (!isset($groupedSubCriteria[$criteriaId])) {
                $groupedSubCriteria[$criteriaId] = [];
            }
            $groupedSubCriteria[$criteriaId][] = $subCriterion;
        }

        // Hitung jumlah kriteria dan subkriteria
        $CriteriaCount = count($criteria);
        $SubCriteriaCount = count($subCriteria);

        // Tampilkan halaman formulir dengan data yang telah diambil
        return view('userform.form', compact('criteria', 'subCriteria', 'groupedSubCriteria', 'CriteriaCount', 'SubCriteriaCount'));
    }

    /**
     * Menangani data formulir yang di-submit.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function submitForm(Request $request)
    {
        try {
            // Ambil semua data formulir yang di-submit
            $formData = $request->all();

            // Inisialisasi matriks perbandingan kriteria
            $matriksKriteria = [];
            $ahpController = new AHPController;
            $alternative = Alternative::all();
            $alternativeKriteria = AlternativeCriteria::all();

            // Membentuk matriks perbandingan kriteria dari data formulir
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

            // Memastikan nilai diagonal pada matriks kriteria adalah 1 (nilai perbandingan diri sendiri adalah 1)
            for ($i = 0; $i < count($matriksKriteria); $i++) {
                $matriksKriteria[$i][$i] = 1;
            }

            // Hitung hasil AHP untuk kriteria
            $HasilKriteria = $ahpController->calculateAHP($matriksKriteria);

            // Inisialisasi array untuk menyimpan matriks perbandingan subkriteria
            $subMatriksKriteriaArray = [];

            // Membentuk matriks perbandingan subkriteria dari data formulir
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

            // Memastikan nilai diagonal pada matriks subkriteria adalah 1 (nilai perbandingan diri sendiri adalah 1)
            foreach ($subMatriksKriteriaArray as $index => $subMatrix) {
                for ($i = 0; $i < count($subMatrix); $i++) {
                    $subMatriksKriteriaArray[$index][$i][$i] = 1;
                }
            }

            // Hitung hasil AHP untuk subkriteria
            $subKirteriaArray = [];
            foreach ($subMatriksKriteriaArray as $index => $subKirteria) {
                $subKirteriaArray[$index] = $ahpController->calculateAHP($subKirteria);
            }

            // Menghitung skor alternatif berdasarkan hasil AHP untuk kriteria dan subkriteria
            $countAlternative = count($alternative);
            $allAlternative = [];
            for ($i = 1; $i <= $countAlternative; $i++) {
                $allAlternative[$i] = $alternativeCriteria = AlternativeCriteria::where('alternative_id', $i)->get();
            }

            $rankAlternative = [];
            $Kriteria_Prioritas = $HasilKriteria['priorities'];
            $SubKriteria_Prioritas = [];
            foreach ($subKirteriaArray as $index => $subKirteria) {
                $SubKriteria_Prioritas[$index] = $subKirteria['priorities'];
            }

            $new_Subkriteria = [];
            $nilai = 0;
            foreach ($subKirteriaArray as $key => $sub) {
                foreach ($sub['priorities'] as $key => $value) {
                    $new_Subkriteria[$nilai] = $value;
                    $nilai = $nilai + 1;
                }
            }

            foreach ($allAlternative as $key_all => $alt) {
                foreach ($alt as $key => $items) {
                    $rankAlternative[$key_all - 1][$key] = $new_Subkriteria[($items->sub_criterion_id) - 1] * $Kriteria_Prioritas[($items->criterion_id) - 1];
                }
            }

            // Menghitung nilai total skor untuk setiap alternatif dan melakukan pengurutan berdasarkan skor terbesar
            $sumRank = [];
            foreach ($alternative as $key => $value) {
                $sumRank[$value['name']] = array_sum($rankAlternative[$key]);
            }
            arsort($sumRank);

            // Mengumpulkan semua hasil perhitungan AHP untuk ditampilkan di halaman hasil
            $data = [
                'HasilKriteria' => $HasilKriteria,
                'Hasil_SubKriteria' => $subKirteriaArray,
                'Ranking' => $rankAlternative,
                'SumRank' => $sumRank,
            ];

            // Simpan data hasil perhitungan AHP ke dalam sesi untuk diakses di halaman hasil
            session()->flash('dt', $data);

            // Tampilkan halaman hasil dengan data hasil perhitungan AHP
            return view('alternatif.rank', compact('data'));
        } catch (\Exception $e) {
            $errorMessage = 'Terjadi error: ' . $e->getMessage();
            return redirect()->back()->with('error', $errorMessage);
        }

    }

    /**
     * Menampilkan halaman hasil perhitungan AHP.
     *
     * @return \Illuminate\View\View
     */
    public function get()
    {
        // Ambil data kriteria, subkriteria, dan hasil perhitungan AHP dari sesi
        $criteria = Criterion::all();
        $subCriteria = SubCriterion::all();
        $data = session()->get('dt');

        // Tampilkan halaman hasil perhitungan AHP dengan data yang telah diambil
        return view('ahp.result', compact('data', 'criteria', 'subCriteria'));
    }
}