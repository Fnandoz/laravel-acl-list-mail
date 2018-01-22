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
Route::get('/home/user/{id}', 'UserController@usuario');
Route::post('/home/user/new', 'UserController@novo');
Route::post('/home/user/remove', 'UserController@remove');
Route::post('/home/user/edit', 'UserController@editar');

Route::get('/home/lista', 'ListaController@index');
Route::get('/home/lista/{id}', 'ListaController@usuario');
Route::post('/home/lista/new', 'ListaController@novo');
Route::post('/home/lista/remove', 'ListaController@remove');
Route::post('/home/lista/edit', 'ListaController@editar');
