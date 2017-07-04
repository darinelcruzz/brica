<?php

Route::get('salir', function ()
{
    Auth::logout();

    return redirect('/');
})->name('getout');
