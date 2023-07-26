<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Math\Matrix;

class AHPController extends Controller
{
    
    public function calculateAHP($criteriaWeights)
    {
        // Memastikan bobot kriteria valid
        if (!$this->areCriteriaWeightsValid($criteriaWeights)) {
            return response()->json(['error' => 'Invalid criteria weights. Please make sure the sum of weights is equal to 1.'], 400);
        }

        // Mengonversi array dengan indeks numerik menjadi array asosiatif dengan indeks yang teratur (0, 1, 2, dst.)
        $criteriaWeights = array_values($criteriaWeights);

        // Lakukan perhitungan AHP
        $priorities = $this->calculatePriorities($criteriaWeights);

        return $priorities;
    }


    // Fungsi untuk memeriksa apakah bobot kriteria valid
    private function areCriteriaWeightsValid($criteriaWeights)
    {
        // Memastikan jumlah bobot adalah 1 (dengan toleransi 1e-6 karena keterbatasan presisi float)
        $totalWeight = array_sum($criteriaWeights);
        if (abs(1 - $totalWeight) > 1e-6) {
            return false;
        }

        return true;
    }

    // Fungsi untuk menghitung prioritas berdasarkan bobot kriteria
    private function calculatePriorities($criteriaWeights)
    {
        $numCriteria = count($criteriaWeights);

        // Normalisasi bobot kriteria
        $normalizedWeights = array_map(function ($weight) use ($numCriteria) {
            return $weight / $numCriteria;
        }, $criteriaWeights);

        return $normalizedWeights;
    }

    // Fungsi untuk menghitung nilai prioritas menggunakan metode AHP
    private function calculateAHPValues($pairwiseMatrix)
    {
        $matrix = new Matrix($pairwiseMatrix);

        // Step 1: Normalisasi matriks berdasarkan jumlah kolom
        $normalizedMatrix = $this->normalizeMatrix($matrix);

        // Step 2: Hitung nilai rata-rata setiap baris normalisasi
        $averageRowValues = $this->calculateAverageRowValues($normalizedMatrix);

        // Step 3: Hitung nilai prioritas akhir sebagai rata-rata nilai rata-rata setiap baris normalisasi
        $priorities = array_sum($averageRowValues) / count($averageRowValues);

        return $priorities;
    }

    // Fungsi untuk melakukan normalisasi matriks berdasarkan jumlah kolom
    private function normalizeMatrix($matrix)
    {
        $rowCount = $matrix->getRowCount();
        $columnCount = $matrix->getColumnCount();
        $normalizedMatrix = [];

        for ($i = 0; $i < $rowCount; $i++) {
            $row = [];
            for ($j = 0; $j < $columnCount; $j++) {
                $row[] = $matrix[$i][$j] / array_sum($matrix->getColumnValues($j));
            }
            $normalizedMatrix[] = $row;
        }

        return new Matrix($normalizedMatrix);
    }

    // Fungsi untuk menghitung nilai rata-rata setiap baris matriks
    private function calculateAverageRowValues($matrix)
    {
        $rowCount = $matrix->getRowCount();
        $averageRowValues = [];

        for ($i = 0; $i < $rowCount; $i++) {
            $averageRowValues[] = array_sum($matrix->getRowValues($i)) / $rowCount;
        }

        return $averageRowValues;
    }
}
