<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    public function users() {
        return $this -> belongsTo(User::class);
    }

    public function words() {
        return $this -> hasMany(Word::class);
    }

}
