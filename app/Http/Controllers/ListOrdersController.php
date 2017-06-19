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
        $pending = Order::selectedOrders('pendiente', ['deliverDate']);

        $authorized = Order::selectedOrders('autorizado');

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

    public function operator(Request $request)
    {
        $inProduction = Order::where('status', 'produccion')->where('team', 'R2')->first();

        /*if($inProduction) {
            return $this->production();
        }*/

        $pending = Order::where('status', 'autorizado')->where('team', 'R2')->get([
            'id', 'caliber','type', 'description', 'team', 'deliverDate'
        ]);

        return view('orders.operator', compact('pending'));
    }

}
