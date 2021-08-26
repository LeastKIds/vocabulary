<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VocaContorller;
use App\Http\Controllers\WordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout']);
// Route::post('/loginCheck', [AuthenticationController::class, 'loginCheck']);

Route::prefix('auth') -> group(function() {
    Route::get('/user', [AuthenticationController::class, 'loginCheck']);
});

Route::middleware(['cors'])->group(function(){
    Route::get('/csrf_token', function(){
        return csrf_token();
    });

    Route::post('test', [VocaContorller::class, 'test']);

    Route::prefix('voca') -> group(function () {

        Route::prefix('vocabulary') -> group(function () {
            Route::get('show', [VocaContorller::class, 'show']);
            Route::post('store', [VocaContorller::class, 'store']);
            Route::delete('/delete/{id}', [VocaContorller::class, 'delete']);
            Route::post('/edit/{id}',[VocaContorller::class, 'edit']);
            Route::get('/myVoca',[VocaContorller::class, 'myVoca']);
            Route::get('/mySearch/{search}',[VocaContorller::class, 'mySearch']);
            Route::get('/search/{search}',[VocaContorller::class, 'search']);
        });

        Route::prefix('word') -> group(function () {
            Route::get('/show/{vocabulary_id}',[WordController::class,'show']);
            Route::post('/store',[WordController::class,'store']);
            Route::delete('/delete/{id}',[WordController::class,'delete']);
            Route::put('/edit/{id}',[WordController::class,'edit']);
            Route::put('/important/{id}',[WordController::class,'important']);
            Route::get('/shuffle/{id}', [WordController::class,'shuffle']);
        });





    });

    Route::prefix('admin') -> group(function () {
        Route::get('/users', [AdminController::class,'users']);
        Route::get('/vocabularies', [AdminController::class,'vocabularies']);
        Route::get('/words/{vocabulary_id}', [AdminController::class,'words']);
    });


});





