<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Quotation;

class ListOrdersController extends Controller
{
    function production()
    {

        $pending = Quotation::production('autorizado');

        $completed = Quotation::production('terminado');

        $authorized = Quotation::production('asignado');

        $production = Quotation::production('produccion');

        $terminated = Quotation::production('finalizado');

        return view('orders.production', compact('pending', 'completed', 'authorized', 'production', 'terminated'));
    }

    function operator(Request $request)
    {
        $currentQ = Quotation::where('status', 'produccion')->where('team', Auth::user()->email)->first();

        if($currentQ) {
            $pending = $currentQ->orders;
            return view('orders.operatorListOrders', compact('pending'));
        }

        $pending = Quotation::where('status', 'asignado')->where('team', Auth::user()->email)->get([
                'id','type', 'description', 'deliver'
            ]);

        return view('orders.operatorListQuotations', compact('pending'));

    }

    function cashier()
    {
        $status = Quotation::where('status', '!=', 'pendiente')->get([
            'quotation', 'client', 'id', 'status', 'description', 'team', 'deliver_date'
        ]);

        return view('orders.cashier', compact('status'));
    }

    function operatorOrder($id)
    {
        $order = Order::find($id);

        return view('orders.operatorOrder', compact('order'));
    }

}
