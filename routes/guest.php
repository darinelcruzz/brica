<?php

use Illuminate\Support\Facades\DB;

Auth::routes();

Route::get('/productos', function () {
    return DB::table('products')->get();
});

Route::get('/home', 'HomeController@index');

Route::get('tests', function() {
    return view('tests');
});
