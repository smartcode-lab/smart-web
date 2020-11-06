<?php


use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>['auth'],'namespace'=>'\App\Http\Controllers\admin'],function(){

    Route::get('/','AdminController@index1')->name('admin.home');

    Route::group(['prefix'=>'post'],function() {
        Route::get('/', 'AdminController@postList')->name('admin.post.home');
    });

    Route::group(['prefix'=>'menu'],function() {
        Route::get('/', 'AdminController@MenuList')->name('admin.menu.home');
    });
});
