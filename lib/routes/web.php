<?php

use Illuminate\Support\Facades\Route;

Route::namespace('admin')->group(function (){
    Route::prefix('admin')->group(function () {
        Route::get('/','adminController@getLogin')->name('admin.home');
        Route::post('/','adminController@postLogin')->name('admin.postLogin');
        Route::get('/logout', 'adminController@logout')->name('admin.logout');
        Route::prefix('user')->group(function(){
            Route::get('/',[
                'as'=>'user.list',
                'uses'=>'userController@list',
                'middleware' =>'can:user_list' 
            ]);
            Route::get('add',[
                'as'=>'user.add',
                'uses'=>'userController@add',
                'middleware' =>'can:user_add' 
            ]);
            Route::post('store',[
                'as'=>'user.store',
                'uses'=>'userController@store',
                'middleware' =>'can:user_add' 
            ]);
            Route::get('edit/{id}',[
                'as'=>'user.edit',
                'uses'=>'userController@edit',
                'middleware' =>'can:user_edit'
            ]);
            Route::post('update/{id}',[
                'as'=>'user.update',
                'uses'=>'userController@update',
                'middleware' =>'can:user_edit'
            ]);
            Route::get('delete/{id}',[
                'as'=>'user.delete',
                'uses'=>'userController@delete',
                'middleware' =>'can:user_delete'
            ]);
        });
        Route::prefix('role')->group(function(){
            Route::get('/',[
                'as'=>'role.list',
                'uses'=>'roleController@list',
                'middleware'=>'can:role_list' 
            ]);
            Route::get('add',[
                'as'=>'role.add',
                'uses'=>'roleController@add',
                'middleware'=>'can:role_add' 
            ]);
            Route::post('store',[
                'as'=>'role.store',
                'uses'=>'roleController@store',
                'middleware'=>'can:role_add' 
            ]);
            Route::get('edit/{id}',[
                'as'=>'role.edit',
                'uses'=>'roleController@edit',
                'middleware'=>'can:role_edit'
            ]);
            Route::post('update/{id}',[
                'as'=>'role.update',
                'uses'=>'roleController@update',
                'middleware'=>'can:role_edit'
            ]);
            Route::get('delete/{id}',[
                'as'=>'role.delete',
                'uses'=>'roleController@delete',
                'middleware'=>'can:role_delete'
            ]);
        });
        Route::prefix('permission')->group(function(){
            Route::get('/',[
                'as'=>'permission.list',
                'uses'=>'permissionController@list',
                'middleware'=>'can:permission_list',
            ]);
            Route::get('add',[
                'as'=>'permission.add',
                'uses'=>'permissionController@add', 
                'middleware'=>'can:permission_add',
            ]);
            Route::post('store',[
                'as'=>'permission.store',
                'uses'=>'permissionController@store', 
                'middleware'=>'can:permission_add',
            ]);
            Route::get('edit/{id}',[
                'as'=>'permission.edit',
                'uses'=>'permissionController@edit',
                'middleware'=>'can:permission_edit',
            ]);
            Route::post('update/{id}',[
                'as'=>'permission.update',
                'uses'=>'permissionController@update',
                'middleware'=>'can:permission_edit',
            ]);
            Route::get('delete/{id}',[
                'as'=>'permission.delete',
                'uses'=>'permissionController@delete',
                'middleware'=>'can:permission_delete',
            ]);
        });
    });
});

Route::get('/', function () {
    return view('welcome');
});
