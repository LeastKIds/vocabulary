<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    function login (Request $request) {

        // if(!auth() -> attempt($request -> only('email','password'))) {
        //     $result = ['error' => '이메일 또는 비밀번호가 맞지 않습니다.', 'success' => 0, 'user' => null];
        //     return response() -> json($result);
        // }

        // https://yoshikixdrum.tistory.com/248
        // http://blog.ujsstudio.com/2020/03/17/laravel인증기능-커스텀/

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return response(auth()->user());
        }
        
        // $request -> session() -> regenerate();

        // $result = ['user' => auth()->user(), 'success' => 1,];
        return response("Login Fail");
        
    }

    function logout () {
        Auth::logout();
        return response(['user' => auth()->user()]);
        // return response() -> json(['user' => auth()->user()]);
    }

    function loginCheck() {
        
        $user = auth()->user();

        if (Auth::check()) {
            return response($user);
        }

        return response($user);
    }

}
