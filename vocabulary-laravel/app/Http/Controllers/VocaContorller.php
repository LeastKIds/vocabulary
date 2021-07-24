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

        $data = json_decode($request, true);

        $title = $data['title'];
        $user_id = $data['user_id'];
        $public = $data['public'];

        $request -> validate([
            'title' => 'required',
            'user_id' => 'required',
        ]);

        $post = newPost();
//        $post ->


//        return response() -> json(array('test' => $test));
    }
}
