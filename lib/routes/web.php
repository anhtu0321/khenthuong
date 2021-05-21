<?php

use Illuminate\Support\Facades\Route;

Route::namespace('admin')->group(function (){
    Route::prefix('admin')->group(function () {
        Route::get('/','adminController@getLogin')->name('admin.home');
        Route::post('/','adminController@postLogin')->name('admin.postLogin');
        Route::prefix('user')->group(function(){
            Route::get('/',[
                'as'=>'user.list',
                'uses'=>'userController@list',
                'middleware' =>'can:list_user' 
            ]);
            Route::get('add',[
                'as'=>'user.add',
                'uses'=>'userController@add' 
            ]);
            Route::post('store',[
                'as'=>'user.store',
                'uses'=>'userController@store' 
            ]);
            Route::get('edit/{id}',[
                'as'=>'user.edit',
                'uses'=>'userController@edit'
            ]);
            Route::post('update/{id}',[
                'as'=>'user.update',
                'uses'=>'userController@update'
            ]);
            Route::get('delete/{id}',[
                'as'=>'user.delete',
                'uses'=>'userController@delete'
            ]);
        });
        Route::prefix('role')->group(function(){
            Route::get('/',[
                'as'=>'role.list',
                'uses'=>'roleController@list' 
            ]);
            Route::get('add',[
                'as'=>'role.add',
                'uses'=>'roleController@add' 
            ]);
            Route::post('store',[
                'as'=>'role.store',
                'uses'=>'roleController@store' 
            ]);
            Route::get('edit/{id}',[
                'as'=>'role.edit',
                'uses'=>'roleController@edit'
            ]);
            Route::post('update/{id}',[
                'as'=>'role.update',
                'uses'=>'roleController@update'
            ]);
            Route::get('delete/{id}',[
                'as'=>'role.delete',
                'uses'=>'roleController@delete'
            ]);
        });
    });
});

Route::get('/', function () {
    return view('welcome');
});
