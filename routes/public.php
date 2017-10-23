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
    $unpaidR = App\Models\Hercules\HReceipt::retainersFromDateToDate('2017-10-01', '2017-10-31')->toArray();
    $paidR = App\Models\Hercules\HReceipt::amountsFromDateToDate('2017-10-01', '2017-10-31')->toArray();
    $deposits = App\Models\Hercules\HDeposit::fromDateToDate('2017-10-01', '2017-10-31')->toArray();

    $mergeR = array_merge_recursive($unpaidR, $paidR, $deposits);
    $receipts = [];
    foreach ($mergeR as $key => $value) {
        if(is_array($value)) {
            $receipts[$key] = array_sum($value);
        } else {
            $receipts[$key] = $value;
        }
    }

    ksort($receipts);

    return $receipts;
});

Route::get('/intranet', function () { return view('brica'); });

Route::get('/', function () { return view('comingsoon'); });

Route::get('excel/exportar', 'ExcelController@export');

Route::get('excel/importar', 'ExcelController@import');

Route::group(['prefix' => 'hercules', 'as' => 'hercules.', 'middleware' => ['auth', 'hercules']], function () {

    Route::get('/', function ()
    {
        return view('hercules.home');
    });

    Route::group(['prefix' => 'articulos', 'as' => 'item.'], function () {
        $ctrl = 'Hercules\ItemController';

        Route::get('/', ['uses' => "$ctrl@items"]);

        Route::get('carrocerias', ['uses' => "$ctrl@index", 'as' => 'bodyworks']);

        Route::get('inventarios/remolques', ['uses' => "$ctrl@trailers", 'as' => 'stocksales']);

        Route::get('inventarios', ['uses' => "$ctrl@inventory",'as' => 'inventory']);

        Route::post('inventario/actualizar', ['uses' => "$ctrl@updateStock",'as' => 'stock.update']);

        Route::get('crear/{type}', ['uses' => "$ctrl@create", 'as' => 'create']);

        Route::post('crear', ['uses' => "$ctrl@store",'as' => 'store']);

        Route::get('editar/{hitem}', ['uses' => "$ctrl@edit", 'as' => 'edit']);

        Route::post('editar', ['uses' => "$ctrl@update", 'as' => 'update']);
    });

    Route::group(['prefix' => 'carrocerias', 'as' => 'bodywork.'], function () {
        $ctrl = 'Hercules\BodyworkController';

        Route::get('redilas', ['uses' => "$ctrl@index", 'as' => 'trucks']);

        Route::get('remolques', ['uses' => "$ctrl@trailers", 'as' => 'trailers']);

        Route::get('crear/{type}', ['uses' => "$ctrl@create", 'as' => 'create']);

        Route::post('crear', ['uses' => "$ctrl@store", 'as' => 'store']);

        Route::post('crear/cantidades', ['uses' => "$ctrl@addQuantities", 'as' => 'quantities']);

        Route::get('editar/{hbodywork}', ['uses' => "$ctrl@edit", 'as' => 'edit']);

        Route::post('editar', ['uses' => "$ctrl@update", 'as' => 'update']);

        Route::get('duplicar/{hbodywork}', ['uses' => "$ctrl@clone", 'as' => 'clone']);

        Route::post('duplicar', ['uses' => "$ctrl@duplicate", 'as' => 'duplicate']);

        Route::get('deshabilitar/{hbodywork}', ['uses' => "$ctrl@disable", 'as' => 'disable']);

        Route::get('{hbodywork}', ['uses' => "$ctrl@show", 'as' => 'show']);
    });

    Route::group(['prefix' => 'clientes', 'as' => 'client.'], function () {
        $ctrl = 'Hercules\ClientController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::get('crear', ['uses' => "$ctrl@create", 'as' => 'create']);

        Route::post('crear', ['uses' => "$ctrl@store", 'as' => 'store']);

        Route::get('{hclient}', ['uses' => "$ctrl@show", 'as' => 'show']);

        Route::get('editar/{hclient}', ['uses' => "$ctrl@edit", 'as' => 'edit']);

        Route::post('editar', ['uses' => "$ctrl@update", 'as' => 'update']);

        Route::get('eliminar/{hclient}', ['uses' => "$ctrl@destroy", 'as' => 'destroy']);
    });

    Route::group(['prefix' => 'recibos', 'as' => 'receipt.'], function () {
        $ctrl = 'Hercules\ReceiptController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::get('disponibles', ['uses' => "$ctrl@available", 'as' => 'available']);

        Route::get('vendidas', ['uses' => "$ctrl@sold", 'as' => 'sold']);

        Route::get('abonos', ['uses' => "$ctrl@deposits", 'as' => 'deposits']);

        Route::post('abonos', ['uses' => "$ctrl@deposit", 'as' => 'deposit']);

        Route::get('comprobante/{hreceipt}', ['uses' => "$ctrl@show", 'as' => 'show']);

        Route::get('crear', ['uses' => "$ctrl@create", 'as' => 'create']);

        Route::post('crear', ['uses' => "$ctrl@store", 'as' => 'store']);

        Route::get('editar/{hreceipt}', ['uses' => "$ctrl@edit", 'as' => 'edit']);

        Route::post('editar', ['uses' => "$ctrl@update", 'as' => 'update']);

        Route::get('transformar/{hreceipt}', ['uses' => "$ctrl@order", 'as' => 'order']);

        Route::get('eliminar/{hreceipt}', ['uses' => "$ctrl@destroy", 'as' => 'destroy']);
    });

    Route::group(['prefix' => 'ventas', 'as' => 'stocksale.'], function () {
        $ctrl = 'Hercules\StockSaleController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::get('crear', ['uses' => "$ctrl@create", 'as' => 'create']);

        Route::post('crear', ['uses' => "$ctrl@store", 'as' => 'store']);

        Route::get('{hstocksale}', ['uses' => "$ctrl@show", 'as' => 'show']);

        Route::get('comprobante/{hstocksale}', ['uses' => "$ctrl@ticket", 'as' => 'ticket']);
    });

    Route::group(['prefix' => 'orden', 'as' => 'order.'], function () {
        $ctrl = 'Hercules\OrderController';

        Route::get('{horder}', ['uses' => "$ctrl@show", 'as' => 'show']);

        Route::get('{horder}/estado/{status}', ['uses' => "$ctrl@status", 'as' => 'status']);

        Route::post('mover', ['uses' => "$ctrl@move", 'as' => 'move']);

        Route::get('{horder}/actualizar/{assigned}', ['uses' => "$ctrl@ticket", 'as' => 'ticket']);

        Route::post('actualizar', ['uses' => "$ctrl@update", 'as' => 'update']);

        Route::get('imprimir/{horder}', ['uses' => "$ctrl@showTicket", 'as' => 'print_ticket']);
    });

    Route::group(['prefix' => 'almacen', 'as' => 'warehouse.'], function () {
        $ctrl = 'Hercules\WarehouseController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::get('semiterminados', ['uses' => "$ctrl@inventory", 'as' => 'semis']);

        Route::get('ordenes', ['uses' => "$ctrl@orders", 'as' => 'all']);

        Route::get('orden/{horder}', ['uses' => "$ctrl@show", 'as' => 'show']);
    });

    Route::group(['prefix' => 'produccion', 'as' => 'production.'], function () {
        $ctrl = 'Hercules\ProductionController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::get('finalizadas', ['uses' => "$ctrl@finished", 'as' => 'finished']);

        Route::post('asignar', ['uses' => "$ctrl@assign", 'as' => 'assign']);

        Route::get('terminados', ['uses' => "$ctrl@done", 'as' => 'done']);

        Route::get('recibo/{horder}', ['uses' => "$ctrl@ticket", 'as' => 'ticket']);
    });

    Route::group(['prefix' => 'personal', 'as' => 'personnel.'], function () {
        $ctrl = 'Hercules\PersonnelController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::post('/', ['uses' => "$ctrl@create", 'as' => 'create']);

        Route::get('editar/{hpersonnel}', ['uses' => "$ctrl@edit", 'as' => 'edit']);

        Route::post('editar', ['uses' => "$ctrl@update", 'as' => 'update']);

        Route::get('eliminar/{hpersonnel}', ['uses' => "$ctrl@destroy", 'as' => 'destroy']);
    });

    Route::group(['prefix' => 'usuarios', 'as' => 'user.'], function () {
        $ctrl = 'Hercules\UsersController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::get('crear', ['uses' => "$ctrl@create", 'as' => 'create']);

        Route::post('crear', ['uses' => "$ctrl@store", 'as' => 'store']);

        Route::get('editar/{user}', ['uses' => "$ctrl@edit", 'as' => 'edit']);

        Route::post('editar', ['uses' => "$ctrl@update", 'as' => 'update']);

        Route::get('eliminar/{user}', ['uses' => "$ctrl@destroy", 'as' => 'destroy']);
    });

    Route::group(['prefix' => 'balance', 'as' => 'balance.'], function () {
        $ctrl = 'Hercules\AdminScreenController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::post('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::get('mensual', ['uses' => "$ctrl@monthly", 'as' => 'monthly']);

        Route::post('mensual', ['uses' => "$ctrl@monthly", 'as' => 'monthly']);

        Route::get('gastos', ['uses' => "$ctrl@expenses", 'as' => 'expenses']);

        Route::post('gastos', ['uses' => "$ctrl@createExpense", 'as' => 'expenses.create']);
    });

    Route::get('reporte/ventas', [
        'uses' => 'Hercules\ReportsController@sales',
        'as' => 'report.sales'
    ]);

    Route::post('reporte/ventas', [
        'uses' => 'Hercules\ReportsController@sales',
        'as' => 'report.sales'
    ]);

    Route::get('foto/cargar/{horder}', [
        'uses' => 'Hercules\PhotoUploadController@create',
        'as' => 'photo.load'
    ]);

    Route::post('foto/guardar', [
        'uses' => 'Hercules\PhotoUploadController@upload',
        'as' => 'photo.upload'
    ]);
});
