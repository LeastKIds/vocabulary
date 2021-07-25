<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use Illuminate\Http\Request;

class VocaContorller extends Controller
{
    // 단어장 목록
    public function show()
    {

        $voca = Vocabulary::where('public', 1) -> orderBy('created_at','DESC') -> get();


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

        return response('vocabulary created');


//        return response() -> json(array('test' => $test));
    }

    public function delete($id) {
        $post = Vocabulary::find($id);
        $post -> delete();

        return response('vocabulary delete');
    }

    public function edit(Request $request, $id) {


        $request -> validate([
            'title' => 'required',
            'public' => 'required'
        ]);

        $voca = Vocabulary::findOrFail($id);

        $title = $request -> title;
        $public = $request -> public;

        $voca -> title = $title;
        $voca -> public = $public;

        $voca -> save();

        return response('vocabulary edit');
    }
}
