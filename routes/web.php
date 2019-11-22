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
    return view('auth/login');
});

Auth::routes();

Route::resource('funcionarios', 'FuncionarioController')->middleware('auth');
Route::resource('cargos', 'CargoController')->middleware('auth');
Route::resource('levels', 'LevelController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
