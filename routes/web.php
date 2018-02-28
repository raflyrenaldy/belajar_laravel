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


Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/client', 'clientController@client');
Route::resource('client', 'clientController');
Route::get('/workspace', 'wsController@workspace')->name('workspace');
Route::resource('workspace', 'wsController');
Route::get('/room', 'roomController@room')->name('room');
Route::resource('room', 'roomController');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');