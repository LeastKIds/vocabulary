<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Validator;

class WordController extends Controller
{
    //

    public function show() {

    }

    public function store(Request $request) {

        $data = $request -> json() -> all();

        for($i=0; $i < count($data); $i += 1)
        {

//            $request -> validate([
//                'chinese_character' => 'required',
//                'hiragana' => 'required',
//                'korean' => 'required',
//                'user_id' => 'required',
//                'vocabulary_id' => 'required'
//            ]);

            $words = $data[$i];
            $chinese_character = $words['chinese_character'];
            $hiragana = $words['hiragana'];
            $korean = $words['korean'];
            $user_id = $words['user_id'];
            $vocabulary_id = $words['vocabulary_id'];

            $word = new Word;
            $word -> chinese_character = $chinese_character;
            $word -> hiragana = $hiragana;
            $word -> korean = $korean;
            $word -> user_id = $user_id;
            $word -> vocabulary_id = $vocabulary_id;

            $word -> save();
        }


        return response('save words');
    }

    public function delete() {

    }

    public function edit() {

    }
}
