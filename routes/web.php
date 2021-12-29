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

Route::get('/', 'BookController@index')->name('home');

Auth::routes();

Route::resource('books', 'BookController')->except(['index'])->middleware('auth');

Route::get('/search', 'BookController@search')->name('searchshow');
Route::post('/searchstore', 'BookController@searchstore')->name('searchstore');

//Route::prefix('books')->name('books.')->group(function() {
//
//});



//Route::get('/home', 'HomeController@index')->name('home');

