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

        $authorized = Order::selectedOrders('autorizado', ['deliverDate']);

        $production = Order::selectedOrders('produccion', ['startTime']);

        $terminated = Order::selectedOrders('finalizado', [
            'pieces', 'startTime', 'endTime'
        ]);


        return view('orders.pending', compact('pending', 'authorized', 'production', 'terminated'));
    }

    function production()
    {
        $pending = Order::selectedOrders('pendiente', ['deliverDate']);

        $authorized = Order::selectedOrders('autorizado', ['deliverDate']);

        $production = Order::selectedOrders('produccion', ['startTime']);

        $terminated = Order::selectedOrders('finalizado', [
            'pieces', 'startTime', 'endTime'
        ]);

        return view('orders.production', compact('pending', 'authorized', 'production', 'terminated'));
    }

    function operator(Request $request)
    {
        $inProduction = Order::where('status', 'produccion')->where('team', 'R2')->first();

        if($inProduction) {

            $pending = Order::where('status', 'produccion')->where('team', 'R2')->first();

            return view('orders.operator', compact('pending'));
            
        }

        $pending = Order::where('status', 'autorizado')->where('team', 'R2')->get([
                'id', 'caliber','type', 'description', 'team', 'deliverDate'
            ]);
        
        return view('orders.operatorList', compact('pending'));
        
    }

    function cashier()
    {
        $status = Order::where('status', '!=', 'pendiente')->get([
            'quotation', 'client', 'id', 'status', 'description', 'team', 'deliverDate'
        ]);

        return view('orders.cashier', compact('status'));
    }

}
