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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/page', 'HomeController@page')->name('page');

Route::get('/hasta/edit/{_id?}', 'HastaController@edit')->name('hasta.edit');
Route::get('/hasta/create', 'HastaController@create')->name('hasta.create');
Route::get('/hasta/save', 'HastaController@save')->name('hasta.save');
Route::get('/hasta/update/{_id}', 'HastaController@update')->name('hasta.update');
Route::get('/hasta/delete/{_id}', 'HastaController@delete')->name('hasta.delete');

Route::get('/search', 'HomeController@search')->name('home');

Route::get('/file', 'FileController@index')->name('viewfile');

Route::get('/file/upload', 'FileController@create')->name('formfile');
Route::post('/file/upload', 'FileController@store')->name('uploadfile');
Route::delete('/file/{id}', 'FileController@destroy')->name('deletefile');


Route::get('/file/download/{id}', 'FileController@show')->name('downloadfile');


Route::get('/analiz', 'SearchController@filter')->name('search');
Route::get('/searching', 'SearchController@search')->name('searching');

