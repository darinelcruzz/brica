<?php

Route::group(['prefix' => 'runa', 'as' => 'runa.'], function () {

    Route::get('/', function ()
    {
        return view('runa.home');
    });

    Route::get('error', function()
    {
        return view('error');
    });

    Route::get('llenar', 'Runa\CashierScreenController@changeToTimestamp');

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
    ])->middleware('payment');

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

    Route::get('cotizaciones/notificado/{quotation}', [
        'uses' => 'Runa\ProQuotationController@notify',
        'as' => 'notify'
    ]);

    Route::get('cotizaciones/detalles/{quotation}', [
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

    Route::post('gerente/asignar', [
        'uses' => 'Runa\ManagerScreenController@assign',
        'as' => 'manager.assign'
    ]);

    Route::get('operadores', [
        'uses' => 'Runa\OperatorScreenController@index',
        'as' => 'operator'
    ]);

    Route::get('operadores/comenzar/{quotation}', [
        'uses' => 'Runa\OperatorScreenController@start',
        'as' => 'operator.start'
    ]);

    Route::get('operadores/terminar/{quotation}', [
        'uses' => 'Runa\OperatorScreenController@finish',
        'as' => 'operator.finish'
    ]);

    Route::get('operadores/{quotation}/ordenes', [
        'uses' => 'Runa\OperatorScreenController@orders',
        'as' => 'operator.orders'
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

    Route::get('orden/{order}', [
        'uses' => 'Runa\OrderController@show',
        'as' => 'order.show'
    ]);

    Route::get('orden/eliminar/{order}', [
        'uses' => 'Runa\OrderController@destroy',
        'as' => 'order.destroy'
    ]);

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

    // Administración
    Route::get('caja', [
        'uses' => 'Runa\AdminScreenController@index',
        'as' => 'cash'
    ])->middleware('money');

    Route::post('caja', [
        'uses' => 'Runa\AdminScreenController@index',
        'as' => 'cash'
    ])->middleware('money');

    Route::get('gastos', [
        'uses' => 'Runa\AdminScreenController@expenses',
        'as' => 'expenses'
    ])->middleware('money');

    Route::post('gastos', [
        'uses' => 'Runa\AdminScreenController@addExpense',
        'as' => 'expenses.create'
    ])->middleware('money');

    Route::get('administrar', [
        'uses' => 'Runa\AdminScreenController@manage',
        'as' => 'manage'
    ])->middleware('owners');

    Route::get('cancelar/{quotation}', [
        'uses' => 'Runa\AdminScreenController@cancel',
        'as' => 'cancel'
    ])->middleware('owners');

    Route::get('productividad', [
        'uses' => 'Runa\ReportController@report',
        'as' => 'report'
    ])->middleware('money');

    Route::post('productividad', [
        'uses' => 'Runa\ReportController@report',
        'as' => 'report'
    ])->middleware('money');

    // Productos
    Route::get('productos', [
        'uses' => 'Runa\ProductController@index',
        'as' => 'products'
    ]);

    Route::get('productos/crear', [
        'uses' => 'Runa\ProductController@create',
        'as' => 'product.create'
    ]);

    Route::post('productos/crear', [
        'uses' => 'Runa\ProductController@store',
        'as' => 'product.store'
    ]);

    Route::get('productos/editar/{product}', [
        'uses' => 'Runa\ProductController@edit',
        'as' => 'product.edit'
    ]);

    Route::post('productos/editar', [
        'uses' => 'Runa\ProductController@update',
        'as' => 'product.update'
    ]);

    // Usuarios
    Route::get('usuarios', [
        'uses' => 'Runa\UserController@index',
        'as' => 'users'
    ])->middleware('owners');

    Route::get('usuarios/crear', [
        'uses' => 'Runa\UserController@create',
        'as' => 'user.create'
    ])->middleware('owners');

    Route::post('usuarios/crear', [
        'uses' => 'Runa\UserController@store',
        'as' => 'user.store'
    ])->middleware('owners');

    Route::get('usuarios/editar/{product}', [
        'uses' => 'Runa\UserController@edit',
        'as' => 'user.edit'
    ])->middleware('owners');

    Route::post('usuarios/editar', [
        'uses' => 'Runa\UserController@update',
        'as' => 'user.update'
    ])->middleware('owners');

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
    Route::get('preguntas', [
        'uses' => 'Runa\QuestionController@index',
        'as' => 'questions'
    ])->middleware('owners');

    Route::get('preguntas/crear', [
        'uses' => 'Runa\QuestionController@create',
        'as' => 'question.create'
    ])->middleware('owners');

    Route::post('preguntas/crear', [
        'uses' => 'Runa\QuestionController@store',
        'as' => 'question.store'
    ])->middleware('owners');

    Route::get('preguntas/editar/{rquestion}', [
        'uses' => 'Runa\QuestionController@edit',
        'as' => 'question.edit'
    ])->middleware('owners');

    Route::post('preguntas/editar', [
        'uses' => 'Runa\QuestionController@update',
        'as' => 'question.update'
    ])->middleware('owners');

    Route::get('preguntas/responder', [
        'uses' => 'Runa\QuestionController@answer',
        'as' => 'question.answer'
    ]);

    Route::post('preguntas/responder', [
        'uses' => 'Runa\QuestionController@survey',
        'as' => 'question.survey'
    ]);
});
