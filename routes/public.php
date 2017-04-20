<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin', function ()
{
    return view('admin');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('entradas/crear', [
    'uses' => 'CreateEntryController@create',
    'as' => 'entries.create'
]);

Route::post('entradas/crear', [
    'uses' => 'CreateEntryController@store',
    'as' => 'entries.store'
]);

Route::get('entradas', [
    'uses' => 'ListEntriesController@show',
    'as' => 'entries.show'
]);

Route::get('orden/crear', [
    'uses' => 'CreateOrderController@create',
    'as' => 'order.create'
]);
