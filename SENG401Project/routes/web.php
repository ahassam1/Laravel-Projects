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

Route::get('/main', 'MainController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/videos/addvideo', 'VideoController@store');

Route::resource('users', 'UserController');
Route::resource('comments', 'CommentController');
Route::resource('ratings', 'RatingController');
Route::resource('users', 'UserController');
Route::resource('videos', 'VideoController');

Route::post('/comments/{video_key}', 'CommentController@store');

/*
Route::get('/routes', 'RoutesController@index');
Route::get('/routes/create', 'RoutesController@create');
Route::post('/routes', 'RoutesController@store');
Route::get('/routes/{route}', 'RoutesController@show');
Route::patch('/routes/{route}', 'RoutesController@update');
Route::delete('/routes/{route}', 'RoutesController@destroy');
Route::get('routes/{route}/edit', 'RoutesController@edit');
*/
