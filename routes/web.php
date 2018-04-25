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
//Route::get('workspace', 'wsController@workspace')->name('workspace');
Route::post('workspace', 'wsController@store');
//Route::post('workspace', 'wsController@destroy');
Route::delete('workspace/{id}', 'wsController@destroy')->name('post-delete');
Route::resource('workspace', 'wsController');
Route::get('/room', 'roomController@room')->name('room');
Route::resource('room', 'roomController');
Route::resource('cctv', 'cctvController');
Route::get('/client2','wsController@client');
Route::get('/findClientName','wsController@findClientName');
Route::get('search', 'cctvController@search');
Route::resource('cctv', 'cctvController');
Route::resource('setting', 'UserController');
Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');