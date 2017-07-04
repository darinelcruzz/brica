<?php

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

    Route::get('gerente', [
        'uses' => 'ListOrdersController@pending',
        'as' => 'pending'
    ]);

    Route::post('gerente', [
        'uses' => 'OrderController@assign',
        'as' => 'assign'
    ]);

    Route::get('completado/{cot?}', function ($cot)
    {
        $q = App\Quotation::find($cot);
        $q->status = 'terminado';
        $q->save();

        return redirect(route('production.production'));;
    })->name('complete');

    Route::get('cambiar', function ()
    {
        $q = App\Quotation::where('status', 'produccion')->get()->last();
        $q->status = 'autorizado';
        $q->save();

        return back();

    })->name('change');

    Route::get('ingenieros', [
        'uses' => 'ListOrdersController@production',
        'as' => 'production',
    ]);


    Route::get('operador', [
        'uses' => 'ListOrdersController@operator',
        'as' => 'operator'
    ]);

    Route::get('operador/listaCotizaciones', [
        'uses' => 'ListOrdersController@operator',
        'as' => 'operatorListQuotations'
    ]);

    Route::get('operador/listaOrdenes', [
        'uses' => 'ListOrdersController@operator',
        'as' => 'operatorListOrders'
    ]);

    Route::get('operador/orden/{id}', [
        'uses' => 'ListOrdersController@operatorOrder',
        'as' => 'operatorOrder'
    ]);

    Route::post('iniciar', [
        'uses' => 'OrderController@start',
        'as' => 'start'
    ]);

    Route::post('terminar', [
        'uses' => 'OrderController@finish',
        'as' => 'finish'
    ]);

});

// Cotizaciones
Route::group(['prefix' => 'cotizaciones', 'as' => 'quotation.'], function () {
    Route::get('produccion', [
        'uses' => 'QuotationController@make',
        'as' => 'make'
    ]);

    Route::post('produccion', [
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
        'uses' => 'QuotationController@show',
        'as' => 'show'
    ]);

    Route::post('/', [
        'uses' => 'QuotationController@pay',
        'as' => 'pay'
    ]);

    Route::get('caja', [
        'uses' => 'QuotationController@cash',
        'as' => 'cash'
    ]);

    Route::post('caja', [
        'uses' => 'QuotationController@cash',
        'as' => 'cash'
    ]);

});

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

    Route::get('/', [
        'uses' => 'ProductController@show',
        'as' => 'show'
    ]);

    Route::get('editar/{id?}', [
        'uses' => 'ProductController@edit',
        'as' => 'edit'
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
