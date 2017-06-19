<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class ListOrdersController extends Controller
{
    function show()
    {
        $orders = Order::all();

        return view('orders.show', compact('orders'));
    }

    function pending()
    {
        $pending = Order::selectedOrders('pendiente');

        $authorized = Order::selectedOrders('autorizado', ['advance']);

        $terminated = Order::selectedOrders('finalizado', [
            'pieces', 'startTime', 'endTime'
        ]);

        return view('orders.pending', compact('pending', 'authorized', 'terminated'));
    }

    function production()
    {
        $authorized = Order::selectedOrders('autorizado');

        $production = Order::selectedOrders('produccion', ['startTime']);

        $terminated = Order::selectedOrders('finalizado', [
            'pieces', 'startTime', 'endTime'
        ]);

        return view('orders.production', compact('authorized', 'production', 'terminated'));
    }
}
