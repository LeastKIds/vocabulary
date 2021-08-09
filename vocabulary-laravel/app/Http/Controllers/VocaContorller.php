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

        if($title == null)
            return response('title is null', 400);
        else if($user_id == null)
            return response('user_id is null', 400);
        else if($public == null)
            return response('public is null', 400);

        $validator = $request -> validate([
            'title' => 'required',
            'user_id' => 'required',
            'public' => 'required'
        ]);

        dd($request[]);
//        if($validator -> fails()) {
//            return $validator;
//        }

        $voca = new Vocabulary();
        $voca -> title = $title;
        $voca -> user_id = $user_id;
        $voca -> public = $public;

        $voca -> save();



        return response() -> json($voca);


//        return response() -> json(array('test' => $test));
    }

    public function delete($id) {
        $post = Vocabulary::find($id);
        $post -> delete();

        return response('vocabulary delete');
    }

    public function edit(Request $request, $id) {

        $title = $request['title'];
        $public = $request['public'];

        if($title == null)
            return response('title is null', 400);
        else if($public == null)
            return response('public is null', 400);

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

    public function myVoca($id)
    {

        $voca = Vocabulary::where('user_id',$id) -> orderBy('created_at','DESC') -> get();

        return $voca;
    }
}
