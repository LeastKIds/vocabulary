<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Validator;

class WordController extends Controller
{
    //

    public function show($vocabulary_id) {
        $words = Word::where('vocabulary_id', $vocabulary_id) -> get();

        return $words;

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

    public function delete($id) {
        $word = Word::find($id);
        $word -> delete();

        return response('success delete');
    }

    public function edit(Request $request, $id) {

        $word = Word::findOrFail($id);

        $chinese_character = $request -> chinese_character;
        $hiragana = $request-> hiragana;
        $korean = $request-> korean;

        $word -> chinese_character = $chinese_character;
        $word -> hiragana = $hiragana;
        $word -> korean = $korean;

        $word -> save();

        return response('success eidt');
    }
}
