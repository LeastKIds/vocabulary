<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use Illuminate\Http\Request;

class VocaContorller extends Controller
{
    // 단어장 목록
    public function show()
    {

        $posts = Vocabulary::where('public', 1);

        return response()->json(array('data' => $posts));

    }

//    단어장 만들기
    public function store(Request $request) {

        $title = $request-> title;
        $user_id = $request-> user_id;

//        return response() -> json(array('test' => $test));
    }
}
