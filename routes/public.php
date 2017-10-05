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

Route::get('/hercules/products', function () {
    return DB::table('h_items')->get();
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

    Route::get('carrocerias/duplicar/{hbodywork}', [
        'uses' => 'Hercules\BodyworkController@clone',
        'as' => 'bodywork.clone'
    ]);

    Route::post('carrocerias/duplicar', [
        'uses' => 'Hercules\BodyworkController@duplicate',
        'as' => 'bodywork.duplicate'
    ]);

    Route::get('carrocerias/deshabilitar/{hbodywork}', [
        'uses' => 'Hercules\BodyworkController@disable',
        'as' => 'bodywork.disable'
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

    Route::get('recibo/{hreceipt}/transformar', [
        'uses' => 'Hercules\ReceiptController@order',
        'as' => 'receipt.order'
    ]);

    Route::get('terminados', [
        'uses' => 'Hercules\StockSaleController@index',
        'as' => 'stocksales'
    ]);

    Route::get('terminados/crear', [
        'uses' => 'Hercules\StockSaleController@create',
        'as' => 'stocksale.create'
    ]);

    Route::get('semiterminados', [
        'uses' => 'Hercules\WarehouseController@inventory',
        'as' => 'semis'
    ]);

    Route::get('orden/{horder}', [
        'uses' => 'Hercules\OrderController@show',
        'as' => 'order.show'
    ]);

    Route::get('orden/{horden}/estado/{status}', [
        'uses' => 'Hercules\OrderController@status',
        'as' => 'order.status'
    ]);

    Route::post('orden/mover', [
        'uses' => 'Hercules\OrderController@move',
        'as' => 'order.move'
    ]);

    Route::get('orden/{horden}/actualizar', [
        'uses' => 'Hercules\OrderController@ticket',
        'as' => 'order.ticket'
    ]);

    Route::post('orden/actualizar', [
        'uses' => 'Hercules\OrderController@update',
        'as' => 'order.update'
    ]);

    Route::get('orden/imprimir/{horden}', [
        'uses' => 'Hercules\OrderController@showTicket',
        'as' => 'order.print_ticket'
    ]);

    Route::get('orden/foto/{horden}', [
        'uses' => 'Hercules\PhotoUploadController@create',
        'as' => 'photo.load'
    ]);

    Route::post('orden/foto', [
        'uses' => 'Hercules\PhotoUploadController@upload',
        'as' => 'photo.upload'
    ]);

    Route::get('almacen', [
        'uses' => 'Hercules\WarehouseController@index',
        'as' => 'warehouse'
    ]);

    Route::get('almacen/orden/{horder}/carroceria/{hbodywork}', [
        'uses' => 'Hercules\WarehouseController@show',
        'as' => 'warehouse.show'
    ]);

    Route::get('produccion', [
        'uses' => 'Hercules\ProductionController@index',
        'as' => 'production'
    ]);

    Route::post('produccion/asignar', [
        'uses' => 'Hercules\ProductionController@assign',
        'as' => 'production.assign'
    ]);

    Route::get('produccion/terminados', [
        'uses' => 'Hercules\ProductionController@done',
        'as' => 'production.done'
    ]);

    Route::get('produccion/recibo/{horder}', [
        'uses' => 'Hercules\ProductionController@ticket',
        'as' => 'production.ticket'
    ]);

    Route::get('personal', [
        'uses' => 'Hercules\PersonnelController@index',
        'as' => 'personnel'
    ]);

    Route::post('personal', [
        'uses' => 'Hercules\PersonnelController@create',
        'as' => 'personnel.create'
    ]);
});
