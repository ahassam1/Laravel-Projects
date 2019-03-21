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
    return view('welcome');
});

Auth::routes();

Route::get('/visitor', 'VisitorsController@index')->name('visitor');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/subscriber', 'SubscriberController@index')->name('subscriber');

Route::get('/books', 'BooksController@index');
Route::get('/comments/create/{book_id}', ['as' => 'comment_create', 'uses' => 'CommentsController@create']);

// wildcard should be last
Route::get('/books/{id}', 'BooksController@show');
Route::get('/comments/{book_id}', 'CommentsController@index');
Route::post('/comments/{book_id}', ['as' => 'comment_post', 'uses' => 'CommentsController@store']);

Route::get('/{id}/{role}', ['as' => 'role_changer', 'uses' => 'AdminController@rolechanger']);
Route::get('/{id}/', ['as' => 'sub_create', 'uses' => 'BooksController@sub']);