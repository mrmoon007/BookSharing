<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AuthorController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\PublisherController;
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
// Route::get('/admin', function () {
//     return view('backend.index');
// })->name('home');

Route::group(['prefix'=>'admin'], function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::resource('/Author',AuthorController::class);
    Route::resource('/Publisher',PublisherController::class);
    Route::resource('/categories',CategoriesController::class);

});

//jafsjajs
