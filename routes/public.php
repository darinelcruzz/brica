<?php

Auth::routes();

Route::get('salir', function ()
{
    Auth::logout();

    return redirect('/');
})->name('getout');

Route::get('/products', function () {
    return DB::table('products')->get();
});

Route::group(['prefix' => 'hercules'], function () {

    Route::get('/', function ()
    {
        return view('hercules');
    });

    Route::get('articulos', [
        'uses' => 'Hercules\ItemController@index',
        'as' => 'item.index'
    ]);

    Route::get('articulos/crear', [
        'uses' => 'Hercules\ItemController@create',
        'as' => 'item.create'
    ]);

    Route::post('articulos/crear', [
        'uses' => 'Hercules\ItemController@store',
        'as' => 'item.store'
    ]);
});

Route::group(['prefix' => 'runa', 'as' => 'runa.'], function () {

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
});
