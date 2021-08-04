<?php

use App\Http\Controllers\VocaContorller;
use App\Http\Controllers\WordController;
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

require __DIR__.'/auth.php';



Route::middleware(['cors'])->group(function(){
    Route::get('/csrf_token', function(){
        return csrf_token();
    });

    Route::prefix('voca') -> group(function () {

        Route::prefix('vocabulary') -> group(function () {
            Route::get('show', [VocaContorller::class, 'show']);
            Route::post('store', [VocaContorller::class, 'store']);
            Route::delete('/delete/{id}', [VocaContorller::class, 'delete']);
            Route::put('/edit/{id}',[VocaContorller::class, 'edit']);
            Route::get('/{id}',[VocaContorller::class, 'myVoca']);
        });

        Route::prefix('word') -> group(function () {
            Route::get('/show/{vocabulary_id}',[WordController::class,'show']);
            Route::post('/store',[WordController::class,'store']);
            Route::delete('/delete/{id}',[WordController::class,'delete']);
            Route::put('/edit/{id}',[WordController::class,'edit']);
            Route::put('/important/{id}',[WordController::class,'important']);
        });
    });




});





