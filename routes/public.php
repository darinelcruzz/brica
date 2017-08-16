<?php

Auth::routes();

Route::get('salir', function ()
{
    Auth::logout();

    return redirect('/intranet');
})->name('getout');

Route::get('/products', function () {
    return DB::table('products')->get();
});

Route::get('/intranet', function () {
    return view('brica');
});

Route::get('/', function () {
    return view('comingsoon');
});

Route::get('excel/exportar', 'ExcelController@export');

Route::get('excel/importar', 'ExcelController@import');

Route::group(['prefix' => 'hercules', 'as' => 'hercules.', 'middleware' => 'auth'], function () {

    Route::get('/', function ()
    {
        return view('hercules.home');
    })->middleware('owners');

    Route::get('articulos', [
        'uses' => 'Hercules\ItemController@index',
        'as' => 'items'
    ]);

    Route::get('articulos/crear', [
        'uses' => 'Hercules\ItemController@create',
        'as' => 'item.create'
    ]);

    Route::post('articulos/crear', [
        'uses' => 'Hercules\ItemController@store',
        'as' => 'item.store'
    ]);

    Route::get('articulos/editar/{hitem}', [
        'uses' => 'Hercules\ItemController@edit',
        'as' => 'item.edit'
    ]);

    Route::post('articulos/editar', [
        'uses' => 'Hercules\ItemController@update',
        'as' => 'item.update'
    ]);

    Route::get('carrocerias', [
        'uses' => 'Hercules\BodyworkController@index',
        'as' => 'bodyworks'
    ]);

    Route::get('carroceria/{hbodywork}', [
        'uses' => 'Hercules\BodyworkController@show',
        'as' => 'bodywork.show'
    ]);

    Route::get('carrocerias/crear', [
        'uses' => 'Hercules\BodyworkController@create',
        'as' => 'bodywork.create'
    ]);

    Route::post('carrocerias/crear', [
        'uses' => 'Hercules\BodyworkController@store',
        'as' => 'bodywork.store'
    ]);

    Route::post('carrocerias/crear/cantidades', [
        'uses' => 'Hercules\BodyworkController@addQuantities',
        'as' => 'bodywork.quantities'
    ]);

    Route::get('carrocerias/editar/{hbodywork}', [
        'uses' => 'Hercules\BodyworkController@edit',
        'as' => 'bodywork.edit'
    ]);

    Route::post('carrocerias/editar', [
        'uses' => 'Hercules\BodyworkController@update',
        'as' => 'bodywork.update'
    ]);

    Route::get('clientes', [
        'uses' => 'Hercules\ClientController@index',
        'as' => 'clients'
    ]);

    Route::get('cliente/{hclient}', [
        'uses' => 'Hercules\ClientController@show',
        'as' => 'client.show'
    ]);

    Route::get('clientes/crear', [
        'uses' => 'Hercules\ClientController@create',
        'as' => 'client.create'
    ]);

    Route::post('clientes/crear', [
        'uses' => 'Hercules\ClientController@store',
        'as' => 'client.store'
    ]);

    Route::get('clientes/editar/{hclient}', [
        'uses' => 'Hercules\ClientController@edit',
        'as' => 'client.edit'
    ]);

    Route::post('clientes/editar', [
        'uses' => 'Hercules\ClientController@update',
        'as' => 'client.update'
    ]);

    Route::get('clientes/eliminar/{hclient}', [
        'uses' => 'Hercules\ClientController@destroy',
        'as' => 'client.destroy'
    ]);

    Route::get('recibos', [
        'uses' => 'Hercules\ReceiptController@index',
        'as' => 'receipts'
    ]);

    Route::get('recibo/{hreceipt}', [
        'uses' => 'Hercules\ReceiptController@show',
        'as' => 'receipt.show'
    ]);

    Route::get('recibos/crear', [
        'uses' => 'Hercules\ReceiptController@create',
        'as' => 'receipt.create'
    ]);

    Route::post('recibos/crear', [
        'uses' => 'Hercules\ReceiptController@store',
        'as' => 'receipt.store'
    ]);

    Route::get('recibos/editar/{hreceipt}', [
        'uses' => 'Hercules\ReceiptController@edit',
        'as' => 'receipt.edit'
    ]);

    Route::post('recibos/editar', [
        'uses' => 'Hercules\ReceiptController@update',
        'as' => 'receipt.update'
    ]);

    Route::get('recibos/eliminar/{hreceipt}', [
        'uses' => 'Hercules\ReceiptController@destroy',
        'as' => 'receipt.destroy'
    ]);
});
