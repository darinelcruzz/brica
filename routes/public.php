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
    'uses' => 'ListOrdersController@show',
    'as' => 'order.show'
]);

// Solicitudes
Route::group(['prefix' => 'orden-de-ventas', 'as' => 'solicitude.'], function () {
    Route::get('crear', [
        'uses' => 'SolicitudeController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'SolicitudeController@store',
        'as' => 'store'
    ]);

    Route::get('/', [
        'uses' => 'SolicitudeController@show',
        'as' => 'show'
    ]);
});

// Ventas produccion
Route::get('ventas-producción/crear', [
    'uses' => 'SaleProductionController@create',
    'as' => 'saleProduction.create'
]);

Route::post('ventas-de-produccion/crear', [
    'uses' => 'SaleProductionController@prepare',
    'as' => 'saleProduction.prepare'
]);

Route::get('ventas-de-produccion', [
    'uses' => 'SaleProductionController@show',
    'as' => 'saleProduction.show'
]);

// Pantalla de pendientes
Route::get('ordenes/pendientes', [
    'uses' => 'ListOrdersController@pending',
    'as' => 'order.pending'
]);

Route::post('ordenes/pendientes', [
    'uses' => 'OrderController@pay',
    'as' => 'order.pay'
]);

// Pantalla de producción
Route::get('ordenes/produccion', [
    'uses' => 'ListOrdersController@production',
    'as' => 'order.production',
]);

Route::post('ordenes/produccion/iniciar', [
    'uses' => 'OrderController@start',
    'as' => 'order.start'
]);

Route::post('ordenes/produccion/terminar', [
    'uses' => 'OrderController@finish',
    'as' => 'order.finish'
]);

Route::get('ordenes/produccion/operador', [
    'uses' => 'ListOrdersController@operator',
    'as' => 'order.operator'
]);

Route::post('ordenes/produccion/operador', [
    'uses' => 'OrderController@authorizes',
    'as' => 'order.authorize'
]);

// Clientes
Route::group(['prefix' => 'clientes', 'as' => 'client.'], function () {
    Route::get('crear', [
        'uses' => 'ClientController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'ClientController@store',
        'as' => 'store'
    ]);

    Route::get('/', [
        'uses' => 'ClientController@show',
        'as' => 'show'
    ]);
});

// Proveedores
Route::group(['prefix' => 'proveedores', 'as' => 'provider.'], function () {
    Route::get('crear', [
        'uses' => 'ProviderController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'ProviderController@store',
        'as' => 'store'
    ]);

    Route::get('/', [
        'uses' => 'ProviderController@show',
        'as' => 'show'
    ]);
});

// Usuarios
Route::group(['prefix' => 'usuarios', 'as' => 'user.'], function () {
    Route::get('crear', [
        'uses' => 'UserController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'UserController@store',
        'as' => 'store'
    ]);

    Route::get('/', [
        'uses' => 'UserController@show',
        'as' => 'show'
    ]);
});

// Cotizaciones
Route::group(['prefix' => 'cotizaciones', 'as' => 'quotation.'], function () {
    Route::get('crear', [
        'uses' => 'QuotationController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'QuotationController@store',
        'as' => 'store'
    ]);

    Route::get('/', [
        'uses' => 'QuotationController@show',
        'as' => 'show'
    ]);
});
