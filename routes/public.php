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
