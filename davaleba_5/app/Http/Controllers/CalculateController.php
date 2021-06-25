<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use mysql_xdevapi\Result;

class CalculateController extends Controller
{
    public function calculate(Request $request){
        $numberOne = $request->get("numberOne");
        $numberTwo = $request->get("numberTwo");
        $action = $request->get("action");
        $result = '0';
        $email = "test.test.1@gmail.com";
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
        $this->mail($result);
        return view("calculate", ["numberOne" => $numberOne, "numberTwo" => $numberTwo, "action" => $action, "result" => $result, "email"=>$email]);
    }

    public function mail($result){
        Mail::raw($result, function ($message){
            $message->to('test.test.1@gmail.com');
        });
        echo "mail has been sent";
    }
}
