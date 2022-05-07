<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlgorithmController extends Controller
{
    public function form() {
        return view('pages.algorithm');
    }

    public function logic(Request $request) {
        $x = $request->input1;
        $y = $request->input2;

        $y = strtoupper($y);

        $found_no_duplication = "";
        $found_duplication = "";
        $arrFound = array();
        $percentage = 0;

        for ($i=0; $i < strlen($y); $i++) {
            for ($j=0; $j < strlen($x); $j++) {
                if ($x[$j] == $y[$i]) {
                    $found_duplication .= $x[$j];
                    if (!array_key_exists($x[$j], $arrFound)) {
                        $arrFound = array_merge($arrFound, [
                            $x[$j] => 1
                        ]);
                        $found_no_duplication .= $x[$j];
                    } else {
                        $arrFound[$x[$j]] = $arrFound[$x[$j]] + 1;
                    }
                }
            }
        }

        if (strlen($x) != 0) {
            $percentage = count($arrFound) / strlen($x) * 100;
        }

        $result = $request->input1." -> ".$request->input2;
        return response()->json(compact('result', 'arrFound', 'found_duplication', 'found_no_duplication', 'percentage'));
    }
}
