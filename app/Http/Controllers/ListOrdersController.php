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
        $pending = Order::where('status', 'pendiente')->get([
			'id', 'caliber','type', 'description', 'team', 'deliverDate'
		]);
		$authorized = Order::where('status', 'autorizado')->get([
			'id', 'caliber', 'type', 'description', 'team'
		]);
		$terminated = Order::where('status', 'finalizado')->get([
			'id', 'caliber', 'type', 'description', 'team', 'pieces', 'startTime', 'endTime'
		]);

        return view('orders.pending', compact('pending', 'authorized', 'terminated'));
    }

    function production()
    {
        $authorized = Order::where('status', 'autorizado')->get([
			'id', 'caliber','type', 'description', 'team'
		]);
        $production = Order::where('status', 'produccion')->get([
			'id', 'caliber', 'type', 'description', 'team', 'startTime'
		]);
        $terminated = Order::where('status', 'finalizado')->get([
            'id', 'caliber', 'type', 'description', 'team', 'pieces', 'startTime', 'endTime'
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
