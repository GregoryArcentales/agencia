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
Route::view('/', 'principal')->name('principal')->middleware('auth');

Route::get('/clientes','ClienteController@index')->name('clientePrincipal');
Route::get('/choferes','ChoferController@index')->name('choferPrincipal');
Route::get('/carreras','CarreraController@index')->name('carreraPrincipal');

Route::get('/cliente/crear', 'ClienteController@create')->name('crearCliente');
Route::get('/chofer/crear', 'ChoferController@create')->name('crearChofer');

Route::post('cliente', 'ClienteController@store')->name('contactoCliente');
Route::post('chofer', 'ChoferController@store')->name('contactoChofer');
Route::post('carrera', 'CarreraController@store')->name('contactoCarrera');

Route::get('/cliente/{id}','ClienteController@show')->name('mostrarCliente');
Route::get('/chofer/{id}','ChoferController@show')->name('mostrarChofer');
Route::get('/carrera/{id}','CarreraController@show')->name('mostrarCarrera');

Route::put('/cliente/editar/{id}', 'ClienteController@update')->name('actualizarCliente');
Route::put('/chofer/editar/{id}', 'ChoferController@update')->name('actualizarChofer');

Route::put('chofer/{id}', 'ChoferController@bajaChofer')->name('eliminarChofer');
Route::delete('clientes/{id}', 'ClienteController@destroy')->name('eliminarCliente');




Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
