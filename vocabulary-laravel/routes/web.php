<?php

use App\Http\Controllers\VocaContorller;
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


Route::prefix('voca') -> group(function () {
    Route::prefix('vocabulary') -> group(function () {
        Route::get('show', [VocaContorller::class, 'show']);
        Route::post('store', [VocaContorller::class, 'store']);
        Route::delete('/delete/{id}', [VocaContorller::class, 'delete']);
        Route::put('/edit',[VocaContext::class,'eidt']);
    });
});
