<?php

use Illuminate\Support\Facades\DB;
use App\Quotation;

Auth::routes();

Route::get('/productos', function () {
    return DB::table('products')->get();
});

Route::get('/home', 'HomeController@index');

Route::get('tests', function() {
    $test = Quotation::find(11);
    $products = unserialize($test->products);
    $quantities = $products['quantity'];
    $materials = $products['material'];
    return view('tests', compact('quantities', 'materials'));
});

Route::get('duda', function() {
	$user = User::first();
    return $user->name;
});

Route::get('pdf', 'PdfController@invoice');
