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

use App\Events\MessagePosted;

Auth::routes();

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/messages', function () {
    return App\Message::with('user')->get();
});

Route::post('/messages', function () {
    $user = App\User::find(3);

    $message = $user->messages()->create([
        'message' => request()->get('message')
    ]);

    event(new MessagePosted($message, $user));

    return ['status' => 'Ok'];
});

Route::get('/home', 'HomeController@index');

Route::get('admin', function ()
{
    return view('admin');
});

Route::get('/', function () {
    return view('welcome');
});

// Entradas
Route::group(['prefix' => 'entradas', 'as' => 'entries.'], function () {
    Route::get('crear', [
        'uses' => 'EntryController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'EntryController@store',
        'as' => 'store'
    ]);

    Route::get('/', [
        'uses' => 'EntryController@show',
        'as' => 'show'
    ]);
});

// Ordenes
Route::get('ordenes-de-produccion/crear', [
    'uses' => 'OrderController@create',
    'as' => 'order.create'
]);

Route::post('ordenes-de-produccion/crear', [
    'uses' => 'OrderController@store',
    'as' => 'order.store'
]);

Route::get('ordenes-de-produccion', [
    'uses' => 'OrderController@show',
    'as' => 'order.show'
]);

// Solicitud
Route::get('orden-de-ventas/crear', [
    'uses' => 'SolicitudeController@create',
    'as' => 'solicitude.create'
]);

Route::post('orden-de-ventas/crear', [
    'uses' => 'SolicitudeController@store',
    'as' => 'solicitude.store'
]);

Route::get('orden-de-ventas', [
    'uses' => 'SolicitudeController@show',
    'as' => 'solicitude.show'
]);

// Ventas produccion
Route::get('ventas-producción/crear', [
    'uses' => 'SaleProductionController@create',
    'as' => 'saleProduction.create'
]);

Route::post('ventas-de-produccion/crear', [
    'uses' => 'SaleProductionController@store',
    'as' => 'saleProduction.store'
]);

Route::get('ventas-de-produccion', [
    'uses' => 'SaleProductionController@show',
    'as' => 'saleProduction.show'
]);

// Pantalla de pendientes
Route::get('ordenes/pendientes', [
    'uses' => 'OrderController@showPending',
    'as' => 'order.pending'
]);

Route::post('ordenes/pendientes', [
    'uses' => 'OrderController@pay',
    'as' => 'order.pay'
]);

// Pantalla de producción
Route::get('ordenes/produccion', [
    'uses' => 'OrderController@showProduction',
    'as' => 'order.production',
]);

Route::post('ordenes/produccion', [
    'uses' => 'OrderController@start',
    'as' => 'order.start'
]);

Route::post('ordenes/produccion2', [
    'uses' => 'OrderController@finish',
    'as' => 'order.finish'
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
