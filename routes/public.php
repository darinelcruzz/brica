<?php

Route::get('salir', function ()
{
    Auth::logout();

    return redirect('/');
})->name('getout');

Route::get('/products', function () {
    return DB::table('products')->get();
});
