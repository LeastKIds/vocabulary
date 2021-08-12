<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function checkLogin() {
        $user = auth() -> user();
        if($user!=null)
            $data=['login' => 1, 'id' => $user['id']];
        else
            $data=['login' => 0, 'id' => null];
        return response() -> json($data);
    }
}
