<?php

Route::get('disenos', 'DesignsController@show');

Route::get('borrar-archivo/{img}', [
    'uses' => 'DesignsController@deleteImage',
    'as' => 'design.delete'
]);

Route::get('subir-archivo/{type?}', [
    'uses' => 'DesignsController@uploadForm',
    'as' => 'design.form'
]);

Route::post('subir-archivo', [
    'uses' => 'DesignsController@upload',
    'as' => 'design.upload'
]);

Route::get('/', function () {
    $user = Auth::user();
    return view('welcome', compact('user'));
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

    Route::get('orden/{cot?}', [
        'uses' => 'OrderController@create',
        'as' => 'create'
    ]);

    Route::post('orden', [
        'uses' => 'OrderController@create',
        'as' => 'create'
    ]);

    Route::post('orden', [
        'uses' => 'OrderController@store',
        'as' => 'store'
    ]);

    Route::get('orden/eliminar/{id}', [
        'uses' => 'OrderController@deleteOrder',
        'as' => 'deleteOrder'
    ]);

    Route::get('gerente', [
        'uses' => 'ManagerScreenController@index',
        'as' => 'manager'
    ]);

    Route::post('gerente', [
        'uses' => 'ManagerScreenController@assign',
        'as' => 'assign'
    ]);

    Route::get('cambiar', function ()
    {
        $q = App\Quotation::where('status', 'produccion')->get()->last();
        $q->status = 'autorizado';
        $q->save();

        return back();

    })->name('change');

    Route::get('ingenieros', [
        'uses' => 'EngineersScreenController@index',
        'as' => 'engineers',
    ]);

    Route::get('completado/{id}', [
        'uses' => 'EngineersScreenController@ordersReady',
        'as' => 'complete'
    ]);

    Route::get('operador/cotizaciones', [
        'uses' => 'OperatorScreenController@showQuotations',
        'as' => 'operator'
    ]);

    Route::get('operador/iniciar/{id}', [
        'uses' => 'OperatorScreenController@start',
        'as' => 'start'
    ]);

    Route::get('operador/cotizaciones/{id}', [
        'uses' => 'OperatorScreenController@showOrders',
        'as' => 'orders'
    ]);

    Route::get('operador/terminar/{id}', [
        'uses' => 'OperatorScreenController@finish',
        'as' => 'finish'
    ]);

    Route::get('operador/orden/{id}', [
        'uses' => 'OrderController@details',
        'as' => 'order.details'
    ]);
});

// Cotizaciones
Route::group(['prefix' => 'cotizaciones', 'as' => 'quotation.'], function () {

    Route::get('listado', [
        'uses' => 'QuotationController@showAll',
        'as' => 'showAll'
    ]);

    Route::get('details/{id}', [
        'uses' => 'QuotationController@details',
        'as' => 'details'
    ]);

    Route::get('cancelar/{id}', [
        'uses' => 'QuotationController@cancel',
        'as' => 'cancel'
    ]);

    Route::get('anticipo', [
        'uses' => 'QuotationController@make',
        'as' => 'make'
    ]);

    Route::post('anticipo', [
        'uses' => 'QuotationController@save',
        'as' => 'save'
    ]);

    Route::get('terminado', [
        'uses' => 'QuotationController@create',
        'as' => 'create'
    ]);

    Route::post('terminado', [
        'uses' => 'QuotationController@store',
        'as' => 'store'
    ]);

    Route::get('/', [
        'uses' => 'CashierScreenController@index',
        'as' => 'show'
    ]);

    Route::get('pagar/{id?}', [
        'uses' => 'CashierScreenController@pay',
        'as' => 'pay'
    ]);

    Route::get('pagar/credito/{id?}', [
        'uses' => 'CashierScreenController@payCredit',
        'as' => 'payCredit'
    ]);

    Route::get('cobrar/{id?}', [
        'uses' => 'CashierScreenController@addRestToBalance',
        'as' => 'charge'
    ]);

    Route::get('produccion', [
        'uses' => 'CashierScreenController@showFinished',
        'as' => 'finished'
    ]);

    Route::get('produccion/{id?}', [
        'uses' => 'CashierScreenController@calculate',
        'as' => 'calculate'
    ]);

    Route::get('caja', [
        'uses' => 'AdminScreenController@index',
        'as' => 'cash'
    ]);

    Route::post('caja', [
        'uses' => 'AdminScreenController@index',
        'as' => 'cash'
    ]);

});

Route::get('ventas', [
    'uses' => 'SaleController@index',
    'as' => 'sale.index'
]);

Route::post('ventas/guardar', [
    'uses' => 'SaleController@save',
    'as' => 'sale.save'
]);

Route::get('ventas/imprimir/{id}', [
    'uses' => 'SaleController@printTicket',
    'as' => 'sale.print'
]);

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
    Route::get('crear/{from?}', [
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

    Route::get('editar/{id}', [
        'uses' => 'ClientController@edit',
        'as' => 'edit'
    ]);

    Route::get('eliminar/{id}', [
        'uses' => 'ClientController@deleteClient',
        'as' => 'delete'
    ]);

    Route::post('cambiar', [
        'uses' => 'ClientController@change',
        'as' => 'change'
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

    Route::get('editar/{id?}', [
        'uses' => 'ProviderController@edit',
        'as' => 'edit'
    ]);

    Route::post('cambiar', [
        'uses' => 'ProviderController@change',
        'as' => 'change'
    ]);
});

// Productos
Route::group(['prefix' => 'productos', 'as' => 'product.'], function () {
    Route::get('crear', [
        'uses' => 'ProductController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'ProductController@store',
        'as' => 'store'
    ]);

    Route::get('/lista', [
        'uses' => 'ProductController@show',
        'as' => 'show'
    ]);

    Route::get('editar/{id?}', [
        'uses' => 'ProductController@edit',
        'as' => 'edit'
    ]);

    Route::post('cambiar', [
        'uses' => 'ProductController@change',
        'as' => 'change'
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
