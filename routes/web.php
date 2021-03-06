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

Route::get('admin/oauth2/client', 'MyController@client');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('username', 'MyController@searchUsername');
Route::get('email', 'MyController@searchEmail');
Route::get('pws', 'MyController@password');
Route::get('activaEnviada', 'Controller@activacion');

Route::get('verificaCorreo/{correo}/{hash}', 'Controller@activaCorreo');
Route::get('/listaEdos', 'Controller@estado');
Route::get('/listaMpio/{entidad}', 'Controller@municipio');
Route::get('/listaPlantel/{entidad}/{municipio}', 'Controller@plantelEdu');
