<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    //

    public function show() {

    }

    public function store(Request $request) {

        $request -> validate([
            'chinese_character' => 'required',
            'hiragana' => 'required',
            'korean' => 'required',
            'user_id' => 'required',
            'vocabulary_id' => 'required'
        ]);

        $chinese_character = $request -> chinese_character;
        $hiragana = $request -> hiragana;
        $korean = $request -> korean;
        $user_id = $request -> user_id;
        $vocabulary_id = $request -> vocabulary_id;

        $word = new Word;
        $word -> chinese_character = $chinese_character;
        $word -> hiragana = $hiragana;
        $word -> korean = $korean;
        $word -> user_id = $user_id;
        $word -> vocabulary_id = $vocabulary_id;

        $word -> save();

        return response('word created');
    }

    public function delete() {

    }

    public function edit() {

    }
}
