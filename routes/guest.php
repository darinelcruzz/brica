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

Route::get('duda', function() {
	$user = User::first();
    return $user->name;
});

Route::get('pdf', 'PdfController@invoice');
