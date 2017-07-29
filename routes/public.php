<?php

Auth::routes();

Route::get('salir', function ()
{
    Auth::logout();

    return redirect('/');
})->name('getout');

Route::get('/products', function () {
    return DB::table('products')->get();
});

Route::group(['prefix' => 'hercules'], function () {

    Route::get('/', function ()
    {
        return view('hercules');
    });

    Route::get('articulos', [
        'uses' => 'Hercules\ItemController@index',
        'as' => 'item.index'
    ]);

    Route::get('articulos/crear', [
        'uses' => 'Hercules\ItemController@create',
        'as' => 'item.create'
    ]);

    Route::post('articulos/crear', [
        'uses' => 'Hercules\ItemController@store',
        'as' => 'item.store'
    ]);
});

Route::group(['prefix' => 'runa', 'as' => 'runa.'], function () {

    Route::get('/', function ()
    {
        return view('runa.home');
    });

    Route::get('cotizaciones/produccion', [
        'uses' => 'Runa\ProQuotationController@create',
        'as' => 'quotationp.create'
    ]);

    Route::post('cotizaciones/produccion', [
        'uses' => 'Runa\ProQuotationController@store',
        'as' => 'quotationp.store'
    ]);

    Route::get('cotizaciones/terminado', [
        'uses' => 'Runa\TerQuotationController@create',
        'as' => 'quotationt.create'
    ]);

    Route::post('cotizaciones/terminado', [
        'uses' => 'Runa\TerQuotationController@store',
        'as' => 'quotationt.store'
    ]);

    Route::get('cotizaciones', [
        'uses' => 'Runa\CashierScreenController@index',
        'as' => 'cashier'
    ]);

    Route::get('cotizaciones/finalizadas', [
        'uses' => 'Runa\CashierScreenController@finished',
        'as' => 'cashier.finished'
    ]);

    Route::get('cotizaciones/finalizadas/{quotation}', [
        'uses' => 'Runa\CashierScreenController@calculate',
        'as' => 'cashier.calculate'
    ]);

    Route::get('cotizaciones/pagarter/{quotation}', [
        'uses' => 'Runa\TerQuotationController@pay',
        'as' => 'pay.terminated'
    ]);

    Route::get('cotizaciones/anticipo/{quotation}', [
        'uses' => 'Runa\ProQuotationController@retainer',
        'as' => 'pay.retainer'
    ]);

    Route::get('cotizaciones/pagarpro/{quotation}', [
        'uses' => 'Runa\ProQuotationController@pay',
        'as' => 'pay.production'
    ]);

    Route::get('cotizaciones/details/{quotation}', [
        'uses' => 'Runa\ProQuotationController@details',
        'as' => 'quotation.details'
    ]);

    // Producción
    Route::get('ingenieros', [
        'uses' => 'Runa\EngineersScreenController@index',
        'as' => 'engineer'
    ]);

    Route::get('ingenieros/{quotation}/completar', [
        'uses' => 'Runa\EngineersScreenController@complete',
        'as' => 'engineer.complete'
    ]);

    Route::get('gerente', [
        'uses' => 'Runa\ManagerScreenController@index',
        'as' => 'manager'
    ]);

    Route::get('gerente/asignar', [
        'uses' => 'Runa\ManagerScreenController@assign',
        'as' => 'manager.assign'
    ]);

    // Órdenes
    Route::get('orden/crear/{id}', [
        'uses' => 'Runa\OrderController@create',
        'as' => 'order.create'
    ]);

    Route::post('orden/crear', [
        'uses' => 'Runa\OrderController@store',
        'as' => 'order.store'
    ]);

    // Clientes
    Route::get('clientes', [
        'uses' => 'Runa\ClientController@index',
        'as' => 'client.index'
    ]);

    Route::get('cliente/crear', [
        'uses' => 'Runa\ClientController@create',
        'as' => 'client.create'
    ]);

    Route::post('cliente/crear', [
        'uses' => 'Runa\ClientController@store',
        'as' => 'client.store'
    ]);

    Route::get('cliente/editar/{client}', [
        'uses' => 'Runa\ClientController@edit',
        'as' => 'client.edit'
    ]);

    Route::post('cliente/editar', [
        'uses' => 'Runa\ClientController@change',
        'as' => 'client.change'
    ]);

    Route::get('cliente/eliminar/{client}', [
        'uses' => 'Runa\ClientController@destroy',
        'as' => 'client.destroy'
    ]);

    Route::get('caja', [
        'uses' => 'Runa\AdminScreenController@index',
        'as' => 'cash'
    ]);

    Route::post('caja', [
        'uses' => 'Runa\AdminScreenController@index',
        'as' => 'cash'
    ]);

    Route::get('gastos', [
        'uses' => 'Runa\AdminScreenController@expenses',
        'as' => 'expenses'
    ]);

    Route::post('gastos', [
        'uses' => 'Runa\AdminScreenController@addExpense',
        'as' => 'expenses.create'
    ]);
});
