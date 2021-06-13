<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('password')),
        ]);
        return $user;
    }
    public function login(LoginRequest $request){
        if (!auth()->attempt($request->all())){
            return response(['error_message'=> 'Incorrect Credentials, Try Again']);
        }
        dd(auth()->user());
//        $user = auth()->user();
//        $token = $user->createToken('Api Token')->accessToken;
        return response(['user' => auth()->user(), 'token' => $token]);
    }
}
