<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password'=>bcrypt($request->get('password')),
        ]);
        return $user;
    }

    public function login(LoginRequest $request){
        if (!auth()->attempt($request->all())){
            return response(['error_message'=>'Incorrect Credentials, Try Again']);
        }
        $user = auth()->user();
        $token = $user->createToken('Api Token')->accessToken;
        Mail::raw('You Have Just Been Signed In.', function ($message){
            $message->to('test.123@gmail.com');
        });
        return response(['user'=>auth()->user(), 'token'=>$token]);
    }
}
