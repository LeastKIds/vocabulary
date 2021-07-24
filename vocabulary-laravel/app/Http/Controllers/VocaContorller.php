<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use Illuminate\Http\Request;

class VocaContorller extends Controller
{
    //
    public function show() {

        $posts = Vocabulary::where('public', 1);

        return response($posts);

    }
}
