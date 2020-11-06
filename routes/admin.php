<?php


use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>['auth'],'namespace'=>'\App\Http\Controllers\admin'],function(){

    Route::get('/','AdminController@index')->name('admin.home');

    Route::group(['prefix'=>'post'],function() {
        Route::get('/', 'AdminController@postList')->name('admin.home');
    });

    Route::group(['prefix'=>'menu'],function() {
        Route::get('/', 'AdminController@MenuList')->name('admin.home');
    });
});