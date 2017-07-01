<?php

use Illuminate\Support\Facades\DB;
use App\Quotation;

Auth::routes();

Route::get('/products', function () {
    return DB::table('products')->get();
});

Route::get('/home', 'HomeController@index');

Route::get('tests', function() {
    $test = Quotation::first();
    return view('tests', compact('test'));
});

Route::get('duda', function() {
	$user = User::first();
    return $user->name;
});

Route::get('pdf', 'PdfController@invoice');
