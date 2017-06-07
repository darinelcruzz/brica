<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class ListOrdersController extends Controller
{
    function allorders()
    {
        $orders = Order::all();

        return view('orders.show', compact('orders'));
    }

    function pending()
    {
        $pending = Order::where('status', 'pendiente')->get([
			'id', 'client', 'type', 'description', 'team'
		]);
		$authorized = Order::where('status', 'autorizado')->get([
			'id', 'client', 'type', 'description', 'team', 'advance'
		]);
		$terminated = Order::where('status', 'finalizado')->get([
			'id', 'client', 'type', 'description', 'team', 'pieces', 'startTime', 'endTime'
		]);

        return view('orders.pending', compact('pending', 'authorized', 'terminated'));
    }

    function production()
    {
        $authorized = Order::where('status', 'autorizado')->get([
			'id', 'client', 'type', 'description', 'team'
		]);
        $production = Order::where('status', 'produccion')->get([
			'id', 'client', 'type', 'description', 'team', 'startTime'
		]);

        return view('orders.production', compact('authorized', 'production'));
    }
}
