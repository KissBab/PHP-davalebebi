<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function calculate(Request $request){
        $numberOne = $request->get("numberOne");
        $numberTwo = $request->get("numberTwo");
        $action = $request->get("action");
        $result = 0;
        if ($action =="a"){
            $result = $numberOne + $numberTwo ;
        }elseif ($action =="s"){
            $result = $numberOne - $numberTwo ;
        }elseif ($action =="m"){
            $result = $numberOne * $numberTwo ;
        }elseif ($action =="d"){
            $result = $numberOne / $numberTwo ;
        }else
            $result = Null;

        return view("calculate", ["numberOne" => $numberOne, "numberTwo" => $numberTwo, "action" => $action, "result" => $result]);
    }
}
