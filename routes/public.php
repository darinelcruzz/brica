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

Route::get('permiso/{company}', function($company) {
    return view('hercules/error', compact('company'));
});

Route::get('/pruebas', function () {
    return Jenssegers\Date\Date::now();
});

Route::get('/hercules/products', function () {
    $hitems = DB::table('h_items')->where('type', 'inventario')->get();
    $items = [];

    foreach ($hitems as $item) {
        $items[$item->id] = $item;
    }

    return $items;

});

Route::get('/intranet', function () {
    return view('brica');
});

Route::get('/', function () {
    return view('comingsoon');
});

Route::get('excel/exportar', 'ExcelController@export');

Route::get('excel/importar', 'ExcelController@import');

Route::group(['prefix' => 'hercules', 'as' => 'hercules.', 'middleware' => ['auth', 'hercules']], function () {

    Route::get('/', function ()
    {
        return view('hercules.home');
    });

    Route::get('articulos/carrocerias', [
        'uses' => 'Hercules\ItemController@index',
        'as' => 'bodyworks.items'
    ]);

    Route::get('articulos/inventarios', [
        'uses' => 'Hercules\ItemController@inventory',
        'as' => 'stocksales.items'
    ]);

    Route::post('inventario/actualizar', [
        'uses' => 'Hercules\ItemController@updateStock',
        'as' => 'stock.update'
    ]);

    Route::get('articulos/crear/{type}', [
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

    Route::get('carrocerias/redilas', [
        'uses' => 'Hercules\BodyworkController@index',
        'as' => 'bodyworks.trucks'
    ]);

    Route::get('carrocerias/remolques', [
        'uses' => 'Hercules\BodyworkController@trailers',
        'as' => 'bodyworks.trailers'
    ]);

    Route::get('carroceria/{hbodywork}', [
        'uses' => 'Hercules\BodyworkController@show',
        'as' => 'bodywork.show'
    ]);

    Route::get('carrocerias/crear/{type}', [
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

    Route::get('disponibles', [
        'uses' => 'Hercules\ReceiptController@available',
        'as' => 'receipt.available'
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

    Route::post('terminados/crear', [
        'uses' => 'Hercules\StockSaleController@store',
        'as' => 'stocksale.store'
    ]);

    Route::get('terminados/{hstocksale}', [
        'uses' => 'Hercules\StockSaleController@show',
        'as' => 'stocksale.show'
    ]);

    Route::get('terminados/ticket/{hstocksale}', [
        'uses' => 'Hercules\StockSaleController@ticket',
        'as' => 'stocksale.ticket'
    ]);

    Route::get('semiterminados', [
        'uses' => 'Hercules\WarehouseController@inventory',
        'as' => 'semis'
    ]);

    Route::get('ordenes', [
        'uses' => 'Hercules\WarehouseController@orders',
        'as' => 'warehouse.all'
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

    Route::get('produccion/finalizadas', [
        'uses' => 'Hercules\ProductionController@finished',
        'as' => 'production.finished'
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

    Route::get('personal/editar/{hpersonnel}', [
        'uses' => 'Hercules\PersonnelController@edit',
        'as' => 'personnel.edit'
    ]);

    Route::post('personal/editar', [
        'uses' => 'Hercules\PersonnelController@update',
        'as' => 'personnel.update'
    ]);

    Route::get('personal/eliminar/{hpersonnel}', [
        'uses' => 'Hercules\PersonnelController@destroy',
        'as' => 'personnel.destroy'
    ]);

    Route::get('usuarios', [
        'uses' => 'Hercules\UsersController@index',
        'as' => 'users'
    ]);

    Route::get('usuarios/crear', [
        'uses' => 'Hercules\UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('usuarios/crear', [
        'uses' => 'Hercules\UsersController@store',
        'as' => 'user.store'
    ]);

    Route::get('usuarios/editar/{user}', [
        'uses' => 'Hercules\UsersController@edit',
        'as' => 'user.edit'
    ]);

    Route::post('usuarios/editar', [
        'uses' => 'Hercules\UsersController@update',
        'as' => 'user.update'
    ]);

    Route::get('usuarios/eliminar/{user}', [
        'uses' => 'Hercules\UsersController@destroy',
        'as' => 'personnel.destroy'
    ]);

    Route::get('balance', [
        'uses' => 'Hercules\AdminScreenController@index',
        'as' => 'balance'
    ]);

    Route::post('balance', [
        'uses' => 'Hercules\AdminScreenController@index',
        'as' => 'balance'
    ]);

    Route::get('gastos', [
        'uses' => 'Hercules\AdminScreenController@expenses',
        'as' => 'expenses'
    ]);

    Route::post('gastos/crear', [
        'uses' => 'Hercules\AdminScreenController@createExpense',
        'as' => 'expenses.create'
    ]);
});
