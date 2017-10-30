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

        Route::get('finalizadas', ['uses' => "$cashCtrl@finished", 'as' => 'cashier.finished']);

        Route::get('finalizadas/{quotation}', ['uses' => "$cashCtrl@calculate", 'as' => 'cashier.calculate']);
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

    // Operadores
    Route::group(['prefix' => 'operadores', 'as' => 'operator.'], function () {
        $ctrl = 'Runa\OperatorScreenController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::get('comenzar/{quotation}', ['uses' => "$ctrl@start", 'as' => 'start']);

        Route::get('terminar/{quotation}', ['uses' => "$ctrl@finish", 'as' => 'finish']);

        Route::get('{quotation}/ordenes', ['uses' => "$ctrl@orders", 'as' => 'orders']);
    });

    // Órdenes
    Route::group(['prefix' => 'orden', 'as' => 'order.'], function ()  {
        $ctrl = 'Runa\OrderController';

        Route::get('crear/{id}', ['uses' => "$ctrl@create", 'as' => 'create']);

        Route::post('crear', ['uses' => "$ctrl@store", 'as' => 'store']);

        Route::get('{order}', ['uses' => "$ctrl@show", 'as' => 'show']);

        Route::get('eliminar/{order}', ['uses' => "$ctrl@destroy", 'as' => 'destroy']);
    });

    // Sales
    Route::get('ventas', [
        'uses' => 'Runa\SaleController@index',
        'as' => 'sale.index'
    ]);
    Route::post('ventas/guardar', [
        'uses' => 'Runa\SaleController@save',
        'as' => 'sale.save'
    ]);
    Route::get('ventas/comprobante/{id}', [
        'uses' => 'Runa\SaleController@ticket',
        'as' => 'sale.ticket'
    ]);

    // Clientes
    Route::group(['prefix' => 'clientes', 'as' => 'client.'], function () {
        $ctrl = 'Runa\ClientController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::get('crear', ['uses' => "$ctrl@create", 'as' => 'create']);

        Route::post('crear', ['uses' => "$ctrl@store", 'as' => 'store']);

        Route::get('editar/{client}', ['uses' => "$ctrl@edit", 'as' => 'edit']);

        Route::post('editar', ['uses' => "$ctrl@change", 'as' => 'change']);

        Route::get('eliminar/{client}', ['uses' => "$ctrl@destroy", 'as' => 'destroy']);
    });

    // Administración
    Route::group(['prefix' => 'administracion'], function () {
        $ctrl = 'Runa\AdminScreenController';

        Route::get('/', ['uses' => "$ctrl@manage", 'as' => 'manage'])->middleware('owners');

        Route::get('cancelar/{quotation}', ['uses' => "$ctrl@cancel", 'as' => 'cancel'])->middleware('owners');

        Route::get('caja', ['uses' => "$ctrl@index", 'as' => 'cash'])->middleware('money');

        Route::post('caja', ['uses' => "$ctrl@index", 'as' => 'cash'])->middleware('money');

        Route::get('gastos', ['uses' => "$ctrl@expenses", 'as' => 'expenses'])->middleware('money');

        Route::post('gastos', ['uses' => "$ctrl@addExpense", 'as' => 'expenses.create'])->middleware('money');
    });

    // Reportes en gráficas
    Route::group(['prefix' => 'reportes', 'as' => 'report.', 'middleware' => 'money'], function () {
        $ctrl = 'Runa\ReportController';

        Route::get('equipos', ['uses' => "$ctrl@teams", 'as' => 'teams']);

        Route::post('equipos', ['uses' => "$ctrl@teams", 'as' => 'teams']);

        Route::get('ventas', ['uses' => "$ctrl@sales", 'as' => 'sales']);

        Route::post('ventas', ['uses' => "$ctrl@sales", 'as' => 'sales']);

        Route::get('clientes', ['uses' => "$ctrl@clients", 'as' => 'clients']);

        Route::post('clientes', ['uses' => "$ctrl@clients", 'as' => 'clients']);

        Route::get('productos', ['uses' => "$ctrl@products", 'as' => 'products']);

        Route::post('productos', ['uses' => "$ctrl@products", 'as' => 'products']);
    });

    // Productos
    Route::group(['prefix' => 'productos', 'as' => 'product.'], function () {
        $ctrl = 'Runa\ProductController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::get('crear', ['uses' => "$ctrl@create", 'as' => 'create']);

        Route::post('crear', ['uses' => "$ctrl@store", 'as' => 'store']);

        Route::get('editar/{product}', ['uses' => "$ctrl@edit", 'as' => 'edit']);

        Route::post('editar', ['uses' => "$ctrl@update", 'as' => 'update']);
    });

    // Artículos inventario
    Route::group(['prefix' => 'articulos', 'as' => 'item.'], function () {
        $ctrl = 'Runa\ItemController';

        Route::get('/', ['uses' => "$ctrl@index",'as' => 'index']);

        Route::get('crear', ['uses' => "$ctrl@create",'as' => 'create']);

        Route::post('crear', ['uses' => "$ctrl@store",'as' => 'store']);

        Route::get('editar/{ritem}', ['uses' => "$ctrl@edit",'as' => 'edit']);

        Route::post('editar', ['uses' => "$ctrl@update",'as' => 'update']);

        Route::post('stock', ['uses' => "$ctrl@stock",'as' => 'stock']);

        Route::get('eliminar/{ritem}', ['uses' => "$ctrl@destroy",'as' => 'destroy']);
    });

    // Usuarios
    Route::group(['prefix' => 'usuarios', 'as' => 'user.', 'middleware' => 'owners'], function () {
        $ctrl = 'Runa\UserController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index']);

        Route::get('crear', ['uses' => "$ctrl@create", 'as' => 'create']);

        Route::post('crear', ['uses' => "$ctrl@store", 'as' => 'store']);

        Route::get('editar/{user}', ['uses' => "$ctrl@edit", 'as' => 'edit']);

        Route::post('editar', ['uses' => "$ctrl@update", 'as' => 'update']);
    });

    // Diseños
    Route::get('disenos', [
        'uses' => 'Runa\DesignsController@index',
        'as' => 'designs'
    ]);

    Route::post('disenos', [
        'uses' => 'Runa\DesignsController@upload',
        'as' => 'design.upload'
    ]);

    Route::get('disenos/eliminar/{img}', [
        'uses' => 'Runa\DesignsController@destroy',
        'as' => 'design.destroy'
    ]);

    // Preguntas
    Route::group(['prefix' => 'preguntas', 'as' => 'question.'], function () {
        $ctrl = 'Runa\QuestionController';

        Route::get('/', ['uses' => "$ctrl@index", 'as' => 'index'])->middleware('owners');

        Route::get('crear', ['uses' => "$ctrl@create", 'as' => 'create'])->middleware('owners');

        Route::post('crear', ['uses' => "$ctrl@store", 'as' => 'store'])->middleware('owners');

        Route::get('editar/{rquestion}', ['uses' => "$ctrl@edit", 'as' => 'edit'])->middleware('owners');

        Route::post('editar', ['uses' => "$ctrl@update", 'as' => 'update'])->middleware('owners');

        Route::get('responder', ['uses' => "$ctrl@answer", 'as' => 'answer']);

        Route::post('responder', ['uses' => "$ctrl@survey", 'as' => 'survey']);
    });
});
