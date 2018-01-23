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

Route::get('/home/user', 'UserController@index');
Route::get('/home/user/{id}', 'UserController@usuario')->where('id', '[0-9]+');
Route::match(['get', 'post'], '/home/user/{id}/edit', 'UserController@editar')->where('id', '[0-9]+');
Route::match(['get', 'post'], '/home/user/new', 'UserController@novo');
Route::post('/home/user/remove', 'UserController@remove');


Route::get('/home/lista', 'ListaController@index')->name('lista.index');
Route::get('/home/lista/{id}', 'ListaController@item');
Route::post('/home/lista/new', 'ListaController@novo');
Route::post('/home/lista/remove', 'ListaController@remove');
Route::post('/home/lista/edit', 'ListaController@editar');
