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

Route::get('/intranet', function () {
    return view('brica');
});

Route::get('/', function () {
    return view('comingsoon');
});

Route::group(['prefix' => 'hercules', 'as' => 'hercules.'], function () {

    Route::get('/', function ()
    {
        return view('hercules.home');
    });

    Route::get('articulos', [
        'uses' => 'Hercules\ItemController@index',
        'as' => 'items'
    ]);

    Route::get('articulos/crear', [
        'uses' => 'Hercules\ItemController@create',
        'as' => 'item.create'
    ]);

    Route::post('articulos/crear', [
        'uses' => 'Hercules\ItemController@store',
        'as' => 'item.store'
    ]);

    Route::get('carrocerias', [
        'uses' => 'Hercules\BodyworkController@index',
        'as' => 'bodyworks'
    ]);

    Route::get('carrocerias/crear', [
        'uses' => 'Hercules\BodyworkController@create',
        'as' => 'bodywork.create'
    ]);

    Route::post('carrocerias/crear', [
        'uses' => 'Hercules\BodyworkController@store',
        'as' => 'bodywork.store'
    ]);
});
