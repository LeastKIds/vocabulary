<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WordController extends Controller
{
    //

    public function __construct() {
        $this -> middleware(['auth']);
    }

    public function show($vocabulary_id) {
        $words = Word::where('vocabulary_id', $vocabulary_id) -> get();

        $vocabulary = Vocabulary::findOrFail($vocabulary_id);

        $user_id = auth() -> user()['id'];

//        return $words->user_id;
//
        if($user_id != $vocabulary -> user_id && $vocabulary -> public !=0) {
            $data = ['success' => 0, 'error' => '권한이 없습니다.'];
            return response()->json($data);
        }

        return $words;

    }

    public function store(Request $request) {


        $user_id = auth()->user()['id'];
        $vocabulary_id = $request['vocabulary_id'];

        $vocabulary = Vocabulary::findOrFail($vocabulary_id);
        if($user_id != $vocabulary -> user_id)
            return ['success' => 0, 'error' => '권한이 없습니다.'];

        $validator = Validator::make(
            array(
                'user_id' => $user_id,
                'vocabulary_id' => $vocabulary_id
            ),
            array(
                'user_id' => 'required',
                'vocabulary_id' => 'required'
            )
        );

        if($validator->fails()) {
            $message = $validator->messages();
            return response($message,400);
        }

        $data = $request['word'];

        foreach($data as $w)
        {
            $chinese_character = $w['chinese_character'];
            $hiragana = $w['hiragana'];
            $korean = $w['korean'];

            $validator = Validator::make(
                array(
                    'chinese_character' => $chinese_character,
                    'hiragana' => $hiragana,
                    'korean' => $korean
                ),
                array(
                    'chinese_character' => 'required',
                    'hiragana' => 'required',
                    'korean' => 'required'
                )
            );

            if($validator->fails()) {
                $message = $validator->messages();
                return response($message,400);
            }


            $word = new Word;
            $word -> chinese_character = $chinese_character;
            $word -> hiragana = $hiragana;
            $word -> korean = $korean;
            $word -> user_id = $user_id;
            $word -> vocabulary_id = $vocabulary_id;

            $word -> save();
        }


        $result = ['success' => 1];
        return response() -> json($result);
    }

    public function delete($id) {
        $user_id = auth() -> user()['id'];
        $word = Word::where('user_id',$user_id) -> find($id);
        $word -> delete();

        $result = ['success' => 1];
        return response() -> json($result);
    }

    public function edit(Request $request, $id) {

        $user_id = auth() -> user()['id'];
        $word = Word::where('user_id',$user_id) -> findOrFail($id);

        $chinese_character = $request -> chinese_character;
        $hiragana = $request-> hiragana;
        $korean = $request-> korean;

        $word -> chinese_character = $chinese_character;
        $word -> hiragana = $hiragana;
        $word -> korean = $korean;

        $word -> save();

        $result = ['success' => 1];
        return response() -> json($result);
    }

    public function important($id) {
        $word = Word::findOrFail($id);

        if($word -> important === 0)
            $word -> important = 1;
        else
            $word -> important = 0;

        $word -> save();

        $result = ['success' => 1];
        return response() -> json($result);
    }

    public function shuffle($id) {
        $word = Word::where('user_id', auth()->user()['id']) -> where('vocabulary_id',$id) -> get();
        $shuffled = $word -> shuffle();

        return $shuffled;
    }



}
