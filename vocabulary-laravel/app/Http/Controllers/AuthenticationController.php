<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    function login (Request $request) {

        // https://yoshikixdrum.tistory.com/248
        // http://blog.ujsstudio.com/2020/03/17/laravel인증기능-커스텀/

        $credentials = $request->only('email', 'password');
        $user = auth()->user();
        if(Auth::attempt($credentials)) {
            return response(['user' => $user, 'success' => 1]);
        }
        
        // $request -> session() -> regenerate();

        // $result = ['user' => auth()->user(), 'success' => 1,];
        return response(['error' => '이메일 또는 비밀번호가 맞지 않습니다.', 'success' => 0, 'user' => $user]);
        
    }

    function logout () {
        
        Auth::logout();
        
        return response(['user' => auth()->user(), 'success' => 1]);
        // return response() -> json(['user' => auth()->user()]);
    }

    function loginCheck() {
        
        $user = auth()->user();

        if (Auth::check()) {
            return response(['login' => 1, 'user' => $user]);
        }

        return response(['login' => 0, 'user' => $user]);
    }

}
