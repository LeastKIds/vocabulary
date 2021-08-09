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
        if($user_id == null)
            return response('user_id is null', 400);
        else if($vocabulary_id == null)
            return response('vocabulary_id is null', 400);

        $data = $request['word'];

        for($i=0; $i < count($data); $i += 1)
        {

            $validation = $data[$i];


            $words = $data[$i];
            $chinese_character = $words['chinese_character'];
            $hiragana = $words['hiragana'];
            $korean = $words['korean'];

            if($chinese_character == null )
                return response('chinese_character is null', 400);
            else if($hiragana == null)
                return response('hiragana is null', 400);
            else if($korean == null)
                return response('korean is null', 400);


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
