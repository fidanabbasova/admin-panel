<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@indexArticles')->name('articles');
    Route::get('/articles', 'AdminController@indexArticles')->name('articles');
    Route::post('/articles', 'AdminController@storeArticle');
    Route::get('/article/{id?}', 'AdminController@showArticle')->name('articles');
    Route::get('/article/{id?}/delete', 'AdminController@deleteModalArticle')->name('articles');
    Route::post('/article/{id?}/delete', 'AdminController@deleteArticle');
    Route::get('/article/{id?}/edit', 'AdminController@editModalArticle')->name('articles');
    Route::post('/article/{id?}/edit', 'AdminController@editArticle');
    Route::get('/article/{id?}/comment/{comment_id?}/delete', 'AdminController@deleteModalComment')->name('articles');
    Route::post('/article/{id?}/comment/{comment_id?}/delete', 'AdminController@deleteComment');

    Route::get('/categories', 'AdminController@indexCategories')->name('categories');
    Route::post('/categories', 'AdminController@storeCategory');
    Route::get('/category/{id?}', 'AdminController@showCategory')->name('categories');
    Route::get('/category/{id?}/delete', 'AdminController@deleteModalCategory')->name('categories');
    Route::post('/category/{id?}/delete', 'AdminController@deleteCategory');
    Route::get('/category/{id?}/edit', 'AdminController@editModalCategory')->name('categories');
    Route::post('/category/{id?}/edit', 'AdminController@editCategory');

    Route::get('/users', 'AdminController@indexUsers')->name('users');
    Route::get('/user/{id?}', 'AdminController@showUser')->name('users');
    Route::get('/user/{id?}/delete', 'AdminController@deleteModalUser')->name('users');
    Route::post('/user/{id?}/delete', 'AdminController@deleteUser');
  
});



Route::auth();

Route::get('/home', 'HomeController@index');
