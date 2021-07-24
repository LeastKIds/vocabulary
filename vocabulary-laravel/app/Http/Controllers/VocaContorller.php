<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use Illuminate\Http\Request;

class VocaContorller extends Controller
{
    // 단어장 목록
    public function show()
    {

        $voca = Vocabulary::where('public', 1) -> get();


        return $voca;

    }

//    단어장 만들기
    public function store(Request $request) {

//        $data = json_decode($request, true);

        $title = $request['title'];
        $user_id = $request['user_id'];
        $public = $request['public'];

        $request -> validate([
            'title' => 'required',
            'user_id' => 'required',
            'public' => 'required'
        ]);

        $voca = new Vocabulary();
        $voca -> title = $title;
        $voca -> user_id = $user_id;
        $voca -> public = $public;

        $voca -> save();

        return response('success');


//        return response() -> json(array('test' => $test));
    }
}
