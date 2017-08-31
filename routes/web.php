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
Route::any('states', 'MyController@searchState');
Route::any('municipality', 'MyController@searchMunicipality');
Route::any('plantel', 'MyController@searchPlantel');
Route::get('username', 'MyController@searchUsername');
Route::get('email', 'MyController@searchEmail');

Route::get('/listaEdos', 'Controller@estado');
Route::get('/listaMpio/{entidad}', 'Controller@municipio');
Route::get('/listaPlantel/{municipio}', 'Controller@plantelEdu');