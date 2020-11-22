<?php


use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>['auth'],'namespace'=>'\App\Http\Controllers\admin'],function(){

    Route::get('/','AdminController@index')->name('admin.home');

    Route::group(['prefix'=>'post'],function() {
        Route::get('/', 'AdminController@postList')->name('admin.post.home');
        Route::get('/add', 'AdminController@add')->name('admin.post.add');
    });

    Route::group(['prefix'=>'menu'],function() {
        Route::post('/store', 'AdminController@store')->name('admin.menu.store');
        Route::get('/', 'AdminController@MenuList')->name('admin.menu.home');
        Route::get('/edit/{menuid}', 'AdminController@edit')->name('admin.menu.edit');
        Route::get('/delete/{menuid}', 'AdminController@delete')->name('admin.menu.delete');
        Route::post('/edit/{menuid}', 'AdminController@edit')->name('admin.menu.edit');
    });

});
