<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Paginas Iniciais da Aplicação
Route::get('usuarios', 'UsuariosController@index');
Route::get('clientes', 'ClientesController@index');

// Cinfigurações do cliente
Route::get('clientes/novo', 'ClientesController@novo');
Route::get('clientes/{cliente}/editar', 'ClientesController@editar');

// CRUD dos Clientes
Route::post('clientes/salvar', 'ClientesController@salvar');
Route::patch('clientes/{cliente}', 'ClientesController@atualizar');
Route::delete('clientes/{cliente}', 'ClientesController@deletar');



Route::group(['middleware' => 'web'], function() {
	Route::get('/', 'HomeController@index');

	Route::auth();


	Route::get('/home', 'HomeController@index');



});






