<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('list');
});

Route::get('list', 'UserController@index')->name('user.list');

Route::get('create', 'UserController@create')->name('user.create');
Route::post('create', 'UserController@store')->name('user.store');

Route::delete('delete/{id}', 'UserController@delete')->name('user.delete');

Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('update/{id}', 'UserController@update')->name('user.update');
