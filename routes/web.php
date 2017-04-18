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

Route::get('/',[
    'uses' => 'ShopController@getIndex',
    'as'   => 'getIndex'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){
    Route::get('/authors',[
        'uses' => 'AuthorController@authors',
        'as'   => 'authors'
    ]);

    Route::post('/add-author',[
        'uses' => 'AuthorController@addAuthor',
        'as'   => 'addAuthor'
    ]);

    Route::get('/search-authors',[
        'uses' => 'AuthorController@searchAuthors',
        'as'   => 'searchAuthors'
    ]);

    Route::get('/delete-author/{authorId}',[
        'uses' => 'AuthorController@deleteAuthor',
        'as'   => 'deleteAuthor'
    ]);

    Route::get('/edit-author/{authorId}',[
        'uses' => 'AuthorController@getEditAuthor',
        'as'   => 'getEditAuthor'
    ]);

    Route::post('/edit-author/{authorId}',[
        'uses' => 'AuthorController@postEditAuthor',
        'as'   => 'postEditAuthor'
    ]);

    Route::get('/categories',[
        'uses' => 'CategoryController@categories',
        'as'   => 'categories'
    ]);

    Route::post('/add-category',[
        'uses' => 'CategoryController@addcategory',
        'as'   => 'addCategory'
    ]);

    Route::get('/delete-category/{categoryId}',[
        'uses' => 'CategoryController@deleteCategory',
        'as'   => 'deleteCategory'
    ]);

    Route::post('/add-subcategory/{categoryId}',[
        'uses' => 'CategoryController@addSubcategory',
        'as'   => 'addSubcategory'
    ]);

    Route::get('/delete-subcategory/{subcategoryId}',[
        'uses' => 'CategoryController@deleteSubcategory',
        'as'   => 'deleteSubcategory'
    ]);

    Route::get('/users',[
        'uses' => 'UserController@users',
        'as'   => 'users'
    ]);

    Route::post('/add-user',[
        'uses' => 'UserController@addUser',
        'as'   => 'addUser'
    ]);

    Route::get('/delete-user/{userId}',[
        'uses' => 'UserController@deleteUser',
        'as'   => 'deleteUser'
    ]);
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
            Route::get('/profile',[
                'uses' => 'UserController@getProfile',
                'as'   => 'getProfile'
            ]);

        Route::get('/logout',[
            'uses' => 'UserController@logout',
            'as'   => 'logout'
        ]);
    });
});
