<?php

Route::group(['prefix' => 'runa', 'as' => 'runa.', 'middleware' => 'runa'], function () {

    Route::get('/', function ()
    {
        return view('runa.home');
    });

    Route::get('error', function()
    {
        return view('error');
    });

    Route::group(['prefix' => 'cotizaciones'], function () {
        $cashCtrl = 'Runa\CashierScreenController';
        $prodCtrl = 'Runa\ProQuotationController';
        $terCtrl = 'Runa\TerQuotationController';

        Route::get('anticipo/{quotation}', ['uses' => "$prodCtrl@retainer", 'as' => 'pay.retainer']);

        Route::get('produccion', ['uses' => "$prodCtrl@create", 'as' => 'quotationp.create']);

        Route::post('produccion', ['uses' => "$prodCtrl@store", 'as' => 'quotationp.store']);

        Route::get('pagarpro/{quotation}', ['uses' => "$prodCtrl@pay", 'as' => 'pay.production']);

        Route::get('notificado/{quotation}', ['uses' => "$prodCtrl@notify", 'as' => 'notify']);

        Route::get('detalles/{quotation}', ['uses' => "$prodCtrl@details", 'as' => 'quotation.details']);

        Route::get('editar/{quotation}', ['uses' => "$prodCtrl@edit", 'as' => 'quotation.edit']);

        Route::post('editar', ['uses' => "$prodCtrl@change", 'as' => 'quotation.change']);

        Route::get('terminado', ['uses' => "$terCtrl@create", 'as' => 'quotationt.create']);

        Route::post('terminado', ['uses' => "$terCtrl@store", 'as' => 'quotationt.store']);

        Route::get('pagarter/{quotation}', ['uses' => "$terCtrl@pay", 'as' => 'pay.terminated']);

        Route::get('/', ['uses' => "$cashCtrl@index", 'as' => 'cashier'])->middleware('payment');

        Route::get('finalizadas', usesas($cashCtrl, 'finished', 'cashier.finished'));

        Route::get('finalizadas/{quotation}', usesas($cashCtrl, 'calculate', 'cashier.calculate'));

        Route::get('foliost', usesas('Runa\ManagerScreenController', 'foliost'));

        Route::get('foliosp', usesas('Runa\ManagerScreenController', 'foliosp'));
        
        Route::get('pagadas', usesas($cashCtrl, 'paid', 'cashier.paid'));
    });

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

    Route::post('gerente/asignar', [
        'uses' => 'Runa\ManagerScreenController@assign',
        'as' => 'manager.assign'
    ]);

    Route::get('gerente/productividad', [
        'uses' => 'Runa\ManagerScreenController@productivity',
        'as' => 'manager.productivity'
    ]);

    Route::post('gerente/peso', [
        'uses' => 'Runa\ManagerScreenController@addWeight',
        'as' => 'manager.addWeight'
    ]);

    Route::get('gerente/resultados', [
        'uses' => 'Runa\ManagerScreenController@results',
        'as' => 'manager.results'
    ]);


    // Operadores
    Route::group(['prefix' => 'operadores', 'as' => 'operator.'], function () {
        $ctrl = 'Runa\OperatorScreenController';

        Route::get('/', usesas($ctrl, 'index'));

        Route::get('comenzar/{quotation}', usesas($ctrl, 'start'));

        Route::get('terminar/{quotation}', usesas($ctrl, 'finish'));

        Route::get('{quotation}/ordenes', usesas($ctrl, 'orders'));
    });

    // Órdenes
    Route::group(['prefix' => 'orden', 'as' => 'order.'], function ()  {
        $ctrl = 'Runa\OrderController';

        Route::get('crear/{id}', usesas($ctrl, 'create'));

        Route::post('crear', usesas($ctrl, 'store'));

        Route::get('{order}', usesas($ctrl, 'show'));

        Route::get('eliminar/{order}', usesas($ctrl, 'destroy'));
    });

    // Cortes
    Route::group(['prefix' => 'corte', 'as' => 'cut.'], function ()  {
        $ctrl = 'Runa\CutController';

        Route::get('/', usesas($ctrl, 'index'));
        
        Route::post('simple', usesas($ctrl, 'create'));

        Route::post('crear', usesas($ctrl, 'store'));

        Route::get('editar/{rcut}/{status}', usesas($ctrl, 'edit'));
        
        Route::get('calcular/{rcut}', usesas($ctrl, 'calculate'));

        Route::post('peso', usesas($ctrl, 'weight'));

        Route::get('{order}', usesas($ctrl, 'show'));

        Route::get('eliminar/{order}', usesas($ctrl, 'destroy'));
    });

    // Sales
    Route::group(['prefix' => 'ventas', 'as' => 'sale.', 'middleware' => 'owners'], function ()  {
        $ctrl = 'Runa\SaleController';

        Route::get('/', usesas($ctrl, 'index'));
        
        Route::post('guardar', usesas($ctrl, 'save'));

        Route::get('comprobante/{sale}', usesas($ctrl, 'ticket'));
    });

    // Clientes
    Route::group(['prefix' => 'clientes', 'as' => 'client.'], function () {
        $ctrl = 'Runa\ClientController';
        Route::get('/', usesas($ctrl, 'index'));
        Route::get('crear', usesas($ctrl, 'create'));
        Route::post('crear', usesas($ctrl, 'store'));
        Route::get('editar/{client}', usesas($ctrl, 'edit'));
        Route::post('editar', usesas($ctrl, 'change'));
        Route::get('eliminar/{client}', usesas($ctrl, 'destroy'));
    });

    // Proveedores
    Route::group(['prefix' => 'proveedores', 'as' => 'provider.'], function () {
        $ctrl = 'Runa\ProviderController';

        Route::get('/', usesas($ctrl, 'index'));
        Route::get('crear', usesas($ctrl, 'create'));
        Route::post('crear', usesas($ctrl, 'store'));
        Route::get('pagar/{rshopping}', usesas($ctrl, 'deposit'));
        Route::get('depositos', usesas($ctrl, 'deposits'));
        Route::post('pagar', usesas($ctrl, 'pay'));
        Route::post('comprar', usesas($ctrl, 'shop'));
        Route::get('editar/{rprovider}', usesas($ctrl, 'edit'));
        Route::post('editar', usesas($ctrl, 'change'));
        Route::get('eliminar/{rprovider}', usesas($ctrl, 'destroy'));
        Route::get('{rprovider}', usesas($ctrl, 'show'));
    });

    // Administración
    Route::group(['prefix' => 'administracion'], function () {
        $ctrl = 'Runa\AdminScreenController';

        Route::get('/', usesas($ctrl, 'manage'))->middleware('owners');

        // Route::get('robo', usesas($ctrl, 'steal'))->middleware('owners');

        Route::get('cancelar/{quotation}', usesas($ctrl, 'cancel'))->middleware('owners');

        Route::match(['get', 'post'], 'diario', usesas($ctrl, 'balance'))->middleware('money');

        Route::match(['get', 'post'], 'mensual', usesas($ctrl, 'monthly'))->middleware('money');

        Route::match(['get', 'post'], 'gastos', usesas($ctrl, 'expenses'))->middleware('money');
    });

    // Reportes en gráficas
    Route::group(['prefix' => 'reportes', 'as' => 'report.', 'middleware' => 'money'], function () {
        $ctrl = 'Runa\ReportController';

        Route::match(['get', 'post'], 'equipos', usesas($ctrl, 'teams'));
        Route::match(['get', 'post'], 'ventas', usesas($ctrl, 'sales'));
        Route::match(['get', 'post'], 'clientes', usesas($ctrl, 'clients'));
        Route::match(['get', 'post'], 'productos', usesas($ctrl, 'products'));
    });

    // Productos
    Route::group(['prefix' => 'productos', 'as' => 'product.'], function () {
        $ctrl = 'Runa\ProductController';

        Route::get('/', usesas($ctrl, 'index'));
        Route::get('crear', usesas($ctrl, 'create'));
        Route::post('crear', usesas($ctrl, 'store'));
        Route::get('editar/{product}', usesas($ctrl, 'edit'));
        Route::post('editar', usesas($ctrl, 'update'));
    });

    // Artículos inventario
    Route::group(['prefix' => 'articulos', 'as' => 'item.'], function () {
        $ctrl = 'Runa\ItemController';

        Route::get('/', usesas($ctrl, 'index'));
        Route::get('crear', usesas($ctrl, 'create'));
        Route::post('crear', usesas($ctrl, 'store'));
        Route::get('editar/{ritem}', usesas($ctrl, 'edit'));
        Route::post('editar', usesas($ctrl, 'update'));
        Route::post('stock', usesas($ctrl, 'stock'));
        Route::get('eliminar/{ritem}', usesas($ctrl, 'destroy'));
    });

    // Usuarios
    Route::group(['prefix' => 'usuarios', 'as' => 'user.', 'middleware' => 'owners'], function () {
        $ctrl = 'Runa\UserController';

        Route::get('/', usesas($ctrl, 'index'));
        Route::get('crear', usesas($ctrl, 'create'));
        Route::post('crear', usesas($ctrl, 'store'));
        Route::get('editar/{user}', usesas($ctrl, 'edit'));
        Route::post('editar', usesas($ctrl, 'update'));
    });

    // Diseños
    Route::get('disenos', usesas('Runa\DesignsController', 'index', 'design.index'));
    Route::post('disenos', usesas('Runa\DesignsController', 'upload', 'design.upload'));
    Route::get('disenos/eliminar/{img}', usesas('Runa\DesignsController', 'destroy', 'design.destroy'));
    Route::get('disenos/limpiar/{timespan}', usesas('Runa\DesignsController', 'clean', 'design.clean'));

    // Preguntas
    Route::group(['prefix' => 'preguntas', 'as' => 'question.'], function () {
        $ctrl = 'Runa\QuestionController';

        Route::get('/', usesas($ctrl, 'index'))->middleware('owners');
        Route::get('crear', usesas($ctrl, 'create'))->middleware('owners');
        Route::post('crear', usesas($ctrl, 'store'))->middleware('owners');
        Route::get('editar/{rquestion}', usesas($ctrl, 'edit'))->middleware('owners');
        Route::post('editar', usesas($ctrl, 'update'))->middleware('owners');
        Route::get('responder', usesas($ctrl, 'answer'));
        Route::post('responder', usesas($ctrl, 'survey'));
    });
});
