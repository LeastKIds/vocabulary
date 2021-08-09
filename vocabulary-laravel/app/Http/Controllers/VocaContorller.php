<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VocaContorller extends Controller
{
    public function __construct() {
        $this -> middleware(['auth']);
    }

    // 단어장 목록
    public function show()
    {

        $voca = Vocabulary::where('public', 1) -> orderBy('created_at','DESC') -> get();


        return $voca;

    }

//    단어장 만들기
    public function store(Request $request) {


        $title = $request['title'];
        $user_id = auth() -> user()['id'];
        $public = $request['public'];


        $validator = Validator::make(
            array(
                'title' => $title,
                'public' => $public,
            ),
            array(
                'title' => 'required',
                'public' => 'required'
            )
        );

        if($validator->fails()) {
            $message = $validator->messages();
            return response($message,400);
        }

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


        $validator = Validator::make(
            array(
                'title' => $title,
                'public' => $public
            ),
            array(
                'title' => 'required',
                'public' => 'required'
            )
        );

        if($validator->fails()) {
            $message = $validator->messages();
            return response($message,400);
        }

        $voca = Vocabulary::findOrFail($id);

        $title = $request -> title;
        $public = $request -> public;

        $voca -> title = $title;
        $voca -> public = $public;

        $voca -> save();

        return response('vocabulary edit');
    }

    public function myVoca()
    {
        $id=auth()->user()['id'];
        $voca = Vocabulary::where('user_id',$id) -> orderBy('created_at','DESC') -> get();

        return $voca;
    }

    public function mySearch($search) {
        $voca = Vocabulary::where('user_id', auth()->user()['id']) -> where('title', 'like', '%'.$search.'%') -> get();

        return $voca;
    }

    public function search($search) {
        $voca = Vocabulary::where('public', 1) -> where('title', 'like', '%'.$search.'%') -> get();

        return $voca;
    }

}
