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

Route::get('/book/{bookId}',[
    'uses' => 'ShopController@book',
    'as'   => 'book'
]);

Route::get('/category/{category}',[
    'uses' => 'ShopController@categoryBooks',
    'as'   => 'categoryBooks'
]);

Route::get('/subcategory/{subcategory}',[
    'uses' => 'ShopController@subcategoryBooks',
    'as'   => 'subcategoryBooks'
]);

Route::get('/author/{author}',[
    'uses' => 'ShopController@authorBooks',
    'as'   => 'authorBooks'
]);

Route::get('/book-search',[
    'uses' => 'ShopController@bookSearch',
    'as'   => 'bookSearch'
]);

Route::get('/add-to-cart/{bookId}',[
    'uses' => 'ShopController@addToCart',
    'as'   => 'addToCart'
]);

Route::get('/shopping-cart',[
    'uses' => 'ShopController@shoppingCart',
    'as'   => 'shoppingCart'
]);

Route::get('/decrease-by-one/{itemId}',[
    'uses' => 'ShopController@decreaseByOne',
    'as'   => 'decreaseByOne'
]);

Route::get('/increase-by-one/{itemId}',[
    'uses' => 'ShopController@increaseByOne',
    'as'   => 'increaseByOne'
]);

Route::get('/checkout',[
    'middleware' => 'auth',
    'uses' => 'ShopController@checkout',
    'as'   => 'checkout'
]);

Route::post('/checkout',[
    'middleware' => 'auth',
    'uses' => 'ShopController@postCheckout',
    'as'   => 'postCheckout'
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

    Route::get('/promote-to-admin/{userId}',[
        'uses' => 'UserController@promoteToAdmin',
        'as'   => 'promoteToAdmin'
    ]);

    Route::get('/back-to-regular/{userId}',[
        'uses' => 'UserController@backToRegular',
        'as'   => 'backToRegular'
    ]);

    Route::get('/books',[
        'uses' => 'BookController@books',
        'as'   => 'books'
    ]);

    Route::post('/add-book',[
        'uses' => 'BookController@addBook',
        'as'   => 'addBook'
    ]);

    Route::get('/search-books',[
        'uses' => 'BookController@searchBooks',
        'as'   => 'searchBooks'
    ]);

    Route::get('/delete-book/{bookId}',[
        'uses' => 'BookController@deleteBook',
        'as'   => 'deleteBook'
    ]);

    Route::get('/edit-book/{bookId}',[
        'uses' => 'BookController@getEditBook',
        'as'   => 'getEditBook'
    ]);

    Route::post('/edit-book/{bookId}',[
        'uses' => 'BookController@postEditBook',
        'as'   => 'postEditBook'
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

        Route::get('/change-password',[
            'uses' => 'UserController@getChangePassword',
            'as'   => 'getChangePassword'
        ]);

        Route::post('/change-password',[
            'uses' => 'UserController@postChangePassword',
            'as'   => 'postChangePassword'
        ]);

        Route::get('/edit-profile',[
            'uses' => 'UserController@getEditProfile',
            'as'   => 'getEditProfile'
        ]);

        Route::post('/edit-profile',[
            'uses' => 'UserController@postEditProfile',
            'as'   => 'postEditProfile'
        ]);

        Route::get('/logout',[
            'uses' => 'UserController@logout',
            'as'   => 'logout'
        ]);
    });
});
