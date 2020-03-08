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

Route::get('/', 'MessageController@index')->name('message.index');
Route::post('/', 'MessageController@store')->name('message.store');

Route::get('/{token}','MessageController@show')->name('message.show');
