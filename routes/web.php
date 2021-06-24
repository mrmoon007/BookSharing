<?php

use App\Http\Controllers\BookController;
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
    return view('frontend.pages.index');
})->name('home');

Route::get('/show',[BookController::class,'show'])->name('show');
Route::get('/admin', function () {
    return view('backend.index');
})->name('home');

Route::group(['prefix'=>'admin'], function(){
    Route::get('/',);

});

//jafsjajs
