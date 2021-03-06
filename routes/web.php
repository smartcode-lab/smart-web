<?php

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
Auth::routes();

Route::namespace('\App\Http\Controllers\Frontend')->group(function () {
    Route::get('/','WebController@index')->name('home.page');
    Route::get('/page/{slug}','WebController@post')->name('home.post');
    Route::get('/page/full/{postid}','WebController@full')->name('home.post.full');
});

//Route::get('/home', 'HomeController@index')->name('home');
