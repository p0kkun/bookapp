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

Route::get('/books', 'BookController@index');
Route::post('/books', 'BookController@store');
Route::delete('/books/{book}', 'BookController@destroy');
// Route::post('/books', 'SearchController@search')->name('search');


// Route::get('/search', 'SearchController@index');
// Route::post('/search', 'SearchController@search')->name('search');
Route::get('/books', 'BookController@index')->name('books.index');
Route::post('/books/search', 'BookController@search')->name('books.search');
Route::resource('books', 'BookController'); // 他のルーティングもこちらに追加されます

