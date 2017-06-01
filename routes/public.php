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
    'uses' => 'EntryController@create',
    'as' => 'entries.create'
]);

Route::post('entradas/crear', [
    'uses' => 'EntryController@store',
    'as' => 'entries.store'
]);

Route::get('entradas', [
    'uses' => 'EntryController@show',
    'as' => 'entries.show'
]);

// Ordenes
Route::get('ordenes/crear', [
    'uses' => 'OrderController@create',
    'as' => 'order.create'
]);

Route::post('ordenes/crear', [
    'uses' => 'OrderController@store',
    'as' => 'order.store'
]);

Route::get('ordenes', [
    'uses' => 'OrderController@show',
    'as' => 'order.show'
]);

// Pantalla de pendientes
Route::get('ordenes/pendientes', [
    'uses' => 'OrderController@showPending',
    'as' => 'order.pending'
]);

Route::get('ordenes/produccion', [
    'uses' => 'OrderController@showProduction',
    'as' => 'order.production'
]);

// Clientes
Route::get('clientes/crear', [
    'uses' => 'ClientController@create',
    'as' => 'client.create'
]);

Route::post('clientes/crear', [
    'uses' => 'ClientController@store',
    'as' => 'client.store'
]);

Route::get('clientes', [
    'uses' => 'ClientController@show',
    'as' => 'client.show'
]);

// Proveedores
Route::get('proveedores/crear', [
    'uses' => 'ProviderController@create',
    'as' => 'provider.create'
]);

Route::post('proveedores/crear', [
    'uses' => 'ProviderController@store',
    'as' => 'provider.store'
]);

Route::get('proveedores', [
    'uses' => 'ProviderController@show',
    'as' => 'provider.show'
]);

// Usuarios
Route::get('usuarios/crear', [
    'uses' => 'UserController@create',
    'as' => 'user.create'
]);

Route::post('usuarios/crear', [
    'uses' => 'UserController@store',
    'as' => 'user.store'
]);

Route::get('usuarios', [
    'uses' => 'UserController@show',
    'as' => 'user.show'
]);
