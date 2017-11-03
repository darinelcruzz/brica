<?php

function usesas($ctrl, $fun, $as = null)
{
    if ($as) {
        return ['uses' => "$ctrl@$fun", 'as' => $as];
    }
    return ['uses' => "$ctrl@$fun", 'as' => $fun];
}

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
    return 'pruebas';
});

Route::get('/intranet', function () { return view('brica'); });

Route::get('/', function () { return view('comingsoon'); });

#Route::get('excel/exportar', 'ExcelController@export');
#Route::get('excel/importar', 'ExcelController@import');

Route::group(['prefix' => 'hercules', 'as' => 'hercules.', 'middleware' => ['auth', 'hercules']], function () {

    Route::get('/', function ()
    {
        return view('hercules.home');
    });

    Route::group(['prefix' => 'articulos', 'as' => 'item.'], function () {
        $ctrl = 'Hercules\ItemController';

        Route::get('/', ['uses' => "$ctrl@items"]);

        Route::get('carrocerias', usesas($ctrl, 'index', 'bodyworks'));

        Route::get('inventarios/remolques', usesas($ctrl, 'trailers', 'stocksales'));

        Route::get('inventarios', usesas($ctrl, 'inventory'));

        Route::post('inventario/actualizar', usesas($ctrl, 'updateStock', 'stock.update'));

        Route::get('crear/{type}', usesas($ctrl, 'create'));

        Route::post('crear', usesas($ctrl, 'store'));

        Route::get('editar/{hitem}', usesas($ctrl, 'edit'));

        Route::post('editar', usesas($ctrl, 'update'));

        Route::get('eliminar/{hitem}', usesas($ctrl, 'destroy'));
    });

    Route::group(['prefix' => 'carrocerias', 'as' => 'bodywork.'], function () {
        $ctrl = 'Hercules\BodyworkController';

        Route::get('redilas', ['uses' => "$ctrl@index", 'as' => 'trucks']);

        Route::get('remolques', usesas($ctrl, 'trailers'));

        Route::get('crear/{type}', usesas($ctrl, 'create'));

        Route::post('crear', usesas($ctrl, 'store'));

        Route::post('crear/cantidades', ['uses' => "$ctrl@addQuantities", 'as' => 'quantities']);

        Route::get('editar/{hbodywork}', usesas($ctrl, 'edit'));

        Route::post('editar', usesas($ctrl, 'update'));

        Route::get('duplicar/{hbodywork}', usesas($ctrl, 'clone'));

        Route::post('duplicar', usesas($ctrl, 'duplicate'));

        Route::get('deshabilitar/{hbodywork}', usesas($ctrl, 'disable'));

        Route::get('{hbodywork}', usesas($ctrl, 'show'));
    });

    Route::group(['prefix' => 'clientes', 'as' => 'client.'], function () {
        $ctrl = 'Hercules\ClientController';

        Route::get('/', usesas($ctrl, 'index'));

        Route::get('crear', usesas($ctrl, 'create'));

        Route::post('crear', usesas($ctrl, 'store'));

        Route::get('{hclient}', usesas($ctrl, 'show'));

        Route::get('editar/{hclient}', usesas($ctrl, 'edit'));

        Route::post('editar', usesas($ctrl, 'update'));

        Route::get('eliminar/{hclient}', usesas($ctrl, 'destroy'));
    });

    Route::group(['prefix' => 'recibos', 'as' => 'receipt.'], function () {
        $ctrl = 'Hercules\ReceiptController';

        Route::get('/', usesas($ctrl, 'index'));

        Route::get('disponibles', usesas($ctrl, 'available'));

        Route::get('disponibles/{id}/{location}', usesas($ctrl, 'export'));

        Route::get('vendidas', usesas($ctrl, 'sold'));

        Route::get('abonos', usesas($ctrl, 'deposits'));

        Route::post('abonos', usesas($ctrl, 'deposit'));

        Route::get('comprobante/{hreceipt}', usesas($ctrl, 'show'));

        Route::get('crear', usesas($ctrl, 'create'));

        Route::post('crear', usesas($ctrl, 'store'));

        Route::get('editar/{hreceipt}', usesas($ctrl, 'edit'));

        Route::post('editar', usesas($ctrl, 'update'));

        Route::get('transformar/{hreceipt}', usesas($ctrl, 'order'));

        Route::get('eliminar/{hreceipt}', usesas($ctrl, 'destroy'));
    });

    Route::group(['prefix' => 'ventas', 'as' => 'stocksale.'], function () {
        $ctrl = 'Hercules\StockSaleController';

        Route::get('/', usesas($ctrl, 'index'));

        Route::get('crear', usesas($ctrl, 'create'));

        Route::post('crear', usesas($ctrl, 'store'));

        Route::get('{hstocksale}', usesas($ctrl, 'show'));

        Route::get('comprobante/{hstocksale}', usesas($ctrl, 'ticket'));
    });

    Route::group(['prefix' => 'orden', 'as' => 'order.'], function () {
        $ctrl = 'Hercules\OrderController';

        Route::get('{horder}', usesas($ctrl, 'show'));

        Route::get('{horder}/estado/{status}', usesas($ctrl, 'status'));

        Route::post('mover', usesas($ctrl, 'move'));

        Route::get('{horder}/actualizar/{assigned}', usesas($ctrl, 'ticket'));

        Route::post('actualizar', usesas($ctrl, 'update'));

        Route::get('imprimir/{horder}', usesas($ctrl, 'showTicket', 'print_ticket'));
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

        Route::get('/', usesas($ctrl, 'index'));

        Route::get('finalizadas', usesas($ctrl, 'finished'));

        Route::post('asignar', usesas($ctrl, 'assign'));

        Route::get('terminados', usesas($ctrl, 'done'));

        Route::get('recibo/{horder}', usesas($ctrl, 'ticket'));
    });

    Route::group(['prefix' => 'personal', 'as' => 'personnel.'], function () {
        $ctrl = 'Hercules\PersonnelController';

        Route::get('/', usesas($ctrl, 'index'));

        Route::post('/', usesas($ctrl, 'create'));

        Route::get('editar/{hpersonnel}', usesas($ctrl, 'edit'));

        Route::post('editar', usesas($ctrl, 'update'));

        Route::get('eliminar/{hpersonnel}', usesas($ctrl, 'destroy'));
    });

    Route::group(['prefix' => 'usuarios', 'as' => 'user.'], function () {
        $ctrl = 'Hercules\UsersController';

        Route::get('/', usesas($ctrl, 'index'));

        Route::get('crear', usesas($ctrl, 'create'));

        Route::post('crear', usesas($ctrl, 'store'));

        Route::get('editar/{user}', usesas($ctrl, 'edit'));

        Route::post('editar', usesas($ctrl, 'update'));

        Route::get('eliminar/{user}', usesas($ctrl, 'destroy'));
    });

    Route::group(['prefix' => 'balance', 'as' => 'balance.'], function () {
        $ctrl = 'Hercules\AdminScreenController';

        Route::get('/', usesas($ctrl, 'index'));

        Route::post('/', usesas($ctrl, 'index'));

        Route::get('mensual', usesas($ctrl, 'monthly'));

        Route::post('mensual', usesas($ctrl, 'monthly'));

        Route::get('gastos', usesas($ctrl, 'expenses'));

        Route::post('gastos', usesas($ctrl, 'createExpense'));
    });

    Route::group(['prefix' => 'reporte', 'as' => 'report.'], function () {
        Route::get('ventas', usesas('Hercules\ReportsController', 'sales'));

        Route::post('ventas', usesas('Hercules\ReportsController', 'sales'));
    });

    Route::group(['prefix' => 'foto', 'as' => 'photo.'], function () {
        Route::get('cargar/{horder}', usesas('Hercules\PhotoUploadController', 'create', 'load'));

        Route::post('guardar', usesas('Hercules\PhotoUploadController', 'upload'));
    });
});
