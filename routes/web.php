<?php

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
    return view('shop.index');
});

Route::group(['prefix' => 'user'],function(){
    Route::group(['middleware' => 'guest'],function(){
        Route::get('/signup',[
            'uses' => 'UserController@getSignUp',
            'as'  => 'getSignUp'
        ]);

        Route::post('/signup',[
            'uses' => 'UserController@postSignUp',
            'as'   => 'postSignUp'
        ]);

        Route::get('/signin',[
            'uses' => 'UserController@getSignIn',
            'as'  => 'getSignIn'
        ]);

        Route::post('/signin',[
            'uses' => 'UserController@postSignIn',
            'as'   => 'postSignIn'
        ]);
    });
    Route::group(['middleware' => 'auth'],function(){
        Route::get('/logout',[
            'uses' => 'UserController@logout',
            'as'   => 'logout'
        ]);
    });
});
