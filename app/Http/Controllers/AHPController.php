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
        $IR = [
            0 => 0.0000,
            1 => 0.0000,
            2 => 0.5245,
            3 => 0.8815,
            4 => 1.1086,
            5 => 1.2479,
            6 => 1.3417,
            7 => 1.4056,
            8 => 1.4499,
            9 => 1.4854,
            10 => 1.5141,
            11 => 1.5365,
            12 => 1.5551,
            13 => 1.5713,
            14 => 1.5838,
            15 => 1.5978,
            16 => 1.6086,
            17 => 1.6181,
            18 => 1.6265,
            19 => 1.6341,
            20 => 1.6409,
            21 => 1.6470,
            22 => 1.6526,
            23 => 1.6577,
            24 => 1.6624,
            25 => 1.6667,
            26 => 1.6706,
            27 => 1.6743,
            28 => 1.6777,
            29 => 1.6809,
            30 => 1.6839,
            31 => 1.6867,
            32 => 1.6893,
            33 => 1.6917,
            34 => 1.6962,
            35 => 1.6086
        ];
        

        // Langkah 9: Hitung Random Consistency Index (RC)
        $RC = $IR[$matrixSize - 1];

        // Langkah 10: Hitung Consistency Ratio (CR)
        if ($RC != 0 && $CI != 0) {
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
