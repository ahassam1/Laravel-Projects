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

Route::get('/comments', 'CommentsController@index');
Route::get('/comments/create', 'CommentsController@create');
Route::post('/comments', 'CommentsController@store');
// wildcard should be last
//Route::get('comments/{id}', 'CommentsController@show');

