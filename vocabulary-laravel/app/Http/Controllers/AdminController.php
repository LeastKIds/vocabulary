<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vocabulary;
use App\Models\Word;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function users() {
        $users = User::get();

        return $users;
    }

    public function vocabularies() {
        $vocabularies = Vocabulary::get();

        return $vocabularies;
    }

    public function words($vocabulary_id) {
        $words = Word::where('vocabulary_id', $vocabulary_id) -> get();

        return $words;
    }
}
