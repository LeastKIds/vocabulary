<?php

namespace App\Http\Controllers;

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

        return $words;

    }

    public function store(Request $request) {


        $user_id = $request['user_id'];
        $vocabulary_id = $request['vocabulary_id'];

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


        return response('save words',200);
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

    public function important($id) {
        $word = Word::findOrFail($id);

        if($word -> important === 0)
            $word -> important = 1;
        else
            $word -> important = 0;

        $word -> save();

        return response('check word');
    }

    public function shuffle($id) {
        $word = Word::where('user_id', auth()->user()['id']) -> where('vocabulary_id',$id) -> get();
        $shuffled = $word -> shuffle();

        return $shuffled;
    }
}
