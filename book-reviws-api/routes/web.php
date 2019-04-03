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
<<<<<<< HEAD
});
=======
});

Route::get('/bookview', 'BookViewController@index');

Route::post('/api/books', 'BookViewController@postform');


//Route::post('api/books/{book_id}', ['as' => 'book_post', 'uses' => 'BookController@api']);


>>>>>>> origin/ali2
