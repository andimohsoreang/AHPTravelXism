<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Math\Matrix;

class AHPController extends Controller
{
    /**
     * Fungsi untuk melakukan perhitungan metode AHP.
     *
     * @param array $comparisonMatrix Matriks perbandingan kriteria/sub-kriteria
     * @return array Hasil perhitungan AHP, berisi prioritas, eigen value, CR, IR, RC, matrix, dan matrixSize.
     */
    public function calculateAHP($comparisonMatrix)
    {
        // Langkah 1: Hitung ukuran matriks dan inisialisasi array untuk menyimpan prioritas
        $matrixSize = count($comparisonMatrix);
        $priorities = array();

        // Langkah 2: Hitung jumlah kolom dalam matriks perbandingan
        $sumColumns = array_map(function () {
            return 0;
        }, $comparisonMatrix);

        for ($i = 0; $i < $matrixSize; $i++) {
            for ($j = 0; $j < $matrixSize; $j++) {
                $sumColumns[$j] += $comparisonMatrix[$i][$j];
            }
        }

        // Langkah 3: Normalisasi matriks perbandingan dengan membagi setiap elemen dengan jumlah kolomnya
        for ($i = 0; $i < $matrixSize; $i++) {
            for ($j = 0; $j < $matrixSize; $j++) {
                $comparisonMatrix[$i][$j] /= $sumColumns[$j];
            }
        }

        // Langkah 4: Hitung prioritas dari setiap kriteria/sub-kriteria
        for ($i = 0; $i < $matrixSize; $i++) {
            $priorities[$i] = array_sum($comparisonMatrix[$i]) / $matrixSize;
        }

        // Langkah 5: Normalisasi vektor prioritas
        $sumPriorities = array_sum($priorities);
        for ($i = 0; $i < $matrixSize; $i++) {
            $priorities[$i] /= $sumPriorities;
        }

        // Langkah 6: Hitung eigen value dari setiap kriteria/sub-kriteria
        $eigenValue = array();
        $sumSize = count($sumColumns);
        for ($i = 0; $i < $sumSize; $i++) {
            $eigenValue[$i] = $priorities[$i] * $sumColumns[$i];
        }

        // Langkah 7: Hitung Consistency Index (CI)
        $SumeigenValue = array_sum($eigenValue);
        $CI = ($SumeigenValue - $matrixSize) / ($matrixSize - 1);

        // Langkah 8: Tabel Inconsistency Ratio (IR)
        $IR = array(
            // ... (nilai-nilai tabel IR)
        );

        // Langkah 9: Hitung Random Consistency Index (RC)
        $RC = $IR[$matrixSize - 1];

        // Langkah 10: Hitung Consistency Ratio (CR)
        if ($RC != 0 || $CI != 0) {
            $CR = $CI / $RC;
        } else {
            $CR = 0;
        }

        // Langkah 11: Persiapkan data hasil perhitungan AHP untuk dikembalikan sebagai hasil
        $data = [
            'priorities' => $priorities,
            'eigenValue' => $eigenValue,
            'CR' => $CR,
            'IR' => $IR[$matrixSize - 1],
            'RC' => $RC,
            'matrix' => $comparisonMatrix,
            'matrixSize' => $matrixSize
        ];

        return $data;
    }
}
