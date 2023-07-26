<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Math\Matrix;

class AHPController extends Controller
{
    public function calculateAHP($comparisonMatrix)
    {
       
        $matrixSize = count($comparisonMatrix);
        $priorities = array();

        $sumColumns = array_map(function () {
            return 0;
        }, $comparisonMatrix);

        for ($i = 0; $i < $matrixSize; $i++) {
            for ($j = 0; $j < $matrixSize; $j++) {
                $sumColumns[$j] += $comparisonMatrix[$i][$j];
            }
        }


        for ($i = 0; $i < $matrixSize; $i++) {
            for ($j = 0; $j < $matrixSize; $j++) {
                $comparisonMatrix[$i][$j] /= $sumColumns[$j];
            }
        }

        for ($i = 0; $i < $matrixSize; $i++) {
            $priorities[$i] = array_sum($comparisonMatrix[$i]) / $matrixSize;
        }

        $sumPriorities = array_sum($priorities);
        for ($i = 0; $i < $matrixSize; $i++) {
            $priorities[$i] /= $sumPriorities;
        }

        $eigenValue = array();
        $sumSize = count($sumColumns);
        for ($i = 0; $i < $sumSize; $i++) {
            $eigenValue[$i] = $priorities[$i] * $sumColumns[$i];
        }

        $SumeigenValue = array_sum($eigenValue);
        $CI = ($SumeigenValue-$matrixSize)/($matrixSize-1);

        $IR = array(
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
        );
        // Assuming the rest of the code is unchanged
        $RC = $IR[$matrixSize - 1];
        $CR = $CI / $RC;
        
        $data = [
            'priorities' => $priorities,
            'eigenValue' => $eigenValue,
            'CR' => $CR,
            'IR' => $IR[$matrixSize - 1],
            'RC' => $RC,
            'matrix' => $comparisonMatrix,
            'matrixSize' => $matrixSize
        ];
        
        return  $data;
        
    }
}