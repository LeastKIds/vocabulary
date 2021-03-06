<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */

    protected $addHttpCookie = true;
    protected $except = [
        //
        'http://localhost:8000/voca/vocabulary/store',
        'http://localhost:8000/voca/vocabulary/delete/*',
        'http://localhost:8000/voca/vocabulary/edit/*',
        'http://localhost:8000/voca/word/store',
        'http://localhost:8000/voca/word/delete/*',
        'http://localhost:8000/voca/word/edit/*',
        '*'

    ];
}
