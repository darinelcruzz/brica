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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin', function ()
{
    return view('admin');
});

Route::get('/', function () {
    return view('welcome');
});

// Entradas
Route::get('entradas/crear', [
    'uses' => 'CreateEntryController@create',
    'as' => 'entries.create'
]);

Route::post('entradas/crear', [
    'uses' => 'CreateEntryController@store',
    'as' => 'entries.store'
]);

Route::get('entradas', [
    'uses' => 'ListEntriesController@show',
    'as' => 'entries.show'
]);

// Ordenes
Route::get('ordenes/crear', [
    'uses' => 'CreateOrderController@create',
    'as' => 'order.create'
]);

Route::post('ordenes/crear', [
    'uses' => 'CreateOrderController@store',
    'as' => 'order.store'
]);

Route::get('ordenes', [
    'uses' => 'ListOrdersController@show',
    'as' => 'order.show'
]);

// Clientes
Route::get('clientes/crear', [
    'uses' => 'CreateClientController@create',
    'as' => 'client.create'
]);

Route::post('clientes/crear', [
    'uses' => 'CreateClientController@store',
    'as' => 'client.store'
]);

Route::get('clientes', [
    'uses' => 'ListClientsController@show',
    'as' => 'client.show'
]);

// Proveedores
Route::get('proveedores/crear', [
    'uses' => 'CreateProviderController@create',
    'as' => 'provider.create'
]);

Route::post('proveedores/crear', [
    'uses' => 'CreateProviderController@store',
    'as' => 'provider.store'
]);

Route::get('proveedores', [
    'uses' => 'ListProvidersController@show',
    'as' => 'provider.show'
]);

// Usuarios
Route::get('usuarios/crear', [
    'uses' => 'CreateUserController@create',
    'as' => 'user.create'
]);

Route::post('usuarios/crear', [
    'uses' => 'CreateUserController@store',
    'as' => 'user.store'
]);

Route::get('usuarios', [
    'uses' => 'ListUsersController@show',
    'as' => 'user.show'
]);
