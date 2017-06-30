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

// Producción
Route::group(['prefix' => 'produccion', 'as' => 'production.'], function () {
    
    Route::get('orden', [
        'uses' => 'OrderController@create',
        'as' => 'create'
    ]);

    Route::post('orden', [
        'uses' => 'OrderController@store',
        'as' => 'store'
    ]);

    Route::get('gerente', [
        'uses' => 'ListOrdersController@pending',
        'as' => 'pending'
    ]);

    Route::post('gerente', [
        'uses' => 'OrderController@assign',
        'as' => 'assign'
    ]);

    Route::get('ingenieros', [
        'uses' => 'ListOrdersController@production',
        'as' => 'production',
    ]);

    Route::get('operador', [
        'uses' => 'ListOrdersController@operator',
        'as' => 'operator'
    ]);

    Route::get('operador/lista', [
        'uses' => 'ListOrdersController@operator',
        'as' => 'operatorList'
    ]);

    Route::post('iniciar', [
        'uses' => 'OrderController@start',
        'as' => 'start'
    ]);

    Route::post('terminar', [
        'uses' => 'OrderController@finish',
        'as' => 'finish'
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

    Route::post('/', [
        'uses' => 'QuotationController@pay',
        'as' => 'pay'
    ]);

    Route::get('cash', [
        'uses' => 'QuotationController@cash',
        'as' => 'cash'
    ]);

    Route::post('cash', [
        'uses' => 'QuotationController@cash',
        'as' => 'cash'
    ]);

});

//Gastos
Route::group(['prefix' => 'gastos', 'as' => 'expense.'], function () {
    Route::get('/', [
        'uses' => 'ExpenseController@create',
        'as' => 'create'
    ]);
        Route::post('/', [
        'uses' => 'ExpenseController@store',
        'as' => 'store'
    ]);
});


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
