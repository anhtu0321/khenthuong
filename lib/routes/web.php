<?php

use Illuminate\Support\Facades\Route;

Route::namespace('admin')->group(function (){
    Route::prefix('admin')->group(function () {
        Route::get('/','adminController@getHome');
        Route::prefix('user')->group(function(){
            Route::get('/',[
                'as'=>'user.list',
                'uses'=>'userController@listUser' 
            ]);
            Route::get('add',[
                'as'=>'user.add',
                'uses'=>'userController@addUser' 
            ]);
            Route::post('store',[
                'as'=>'user.store',
                'uses'=>'userController@storeUser' 
            ]);
            Route::get('edit/{id}',[
                'as'=>'user.edit',
                'uses'=>'userController@editUser'
            ]);
            Route::post('update/{id}',[
                'as'=>'user.update',
                'uses'=>'userController@updateUser'
            ]);
            Route::get('delete/{id}',[
                'as'=>'user.delete',
                'uses'=>'userController@deleteUser'
            ]);
        });
    });
});

Route::get('/', function () {
    return view('welcome');
});
