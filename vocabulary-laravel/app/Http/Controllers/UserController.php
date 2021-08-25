<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function checkLogin() {
        $user = auth() -> user();
        if($user!=null)
            $data=['login' => 1, 'user' => $user];
        else
            $data=['login' => 0, 'user' => null];
        return response() -> json($data);
    }
}
