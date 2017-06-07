<?php

Route::get('orders', function() {
    return App\Order::all();
});
