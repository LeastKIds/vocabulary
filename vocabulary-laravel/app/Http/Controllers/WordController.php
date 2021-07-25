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



//        for($i=0; $request[$i] != null; $i += 1)
//        {
//
//            $request -> validate([
//                'chinese_character' => 'required',
//                'hiragana' => 'required',
//                'korean' => 'required',
//                'user_id' => 'required',
//                'vocabulary_id' => 'required'
//            ]);
//
//            $chinese_character = $request[$i] -> chinese_character;
//            $hiragana = $request[$i] -> hiragana;
//            $korean = $request[$i] -> korean;
//            $user_id = $request[$i] -> user_id;
//            $vocabulary_id = $request[$i] -> vocabulary_id;
//
//            $word = new Word;
//            $word -> chinese_character = $chinese_character;
//            $word -> hiragana = $hiragana;
//            $word -> korean = $korean;
//            $word -> user_id = $user_id;
//            $word -> vocabulary_id = $vocabulary_id;
//
//            $word -> save();
//        }


        $words = $request -> words;
        $attributes = [
            'korea' => ['required'],
        ];
        $validator = $request -> validate($attributes);

        if($validator -> fails()) {
            return response('failed');
        }



        return response($words[0]);
    }

    public function delete() {

    }

    public function edit() {

    }
}
