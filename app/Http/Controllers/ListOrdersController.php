<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Quotation;

class ListOrdersController extends Controller
{

    function pending()
    {
        $pending = Quotation::selectedQuotations('autorizado', ['deliver']);

        $completed = Quotation::selectedQuotations('terminado', ['deliver']);

        $authorized = Quotation::selectedQuotations('asignado', ['team','deliver']);

        $production = Quotation::selectedQuotations('produccion', ['team','startTime']);

        $terminated = Quotation::selectedQuotations('finalizado', [
            'team', 'startTime', 'endTime'
        ]);


        return view('orders.pending', compact('pending', 'completed', 'authorized', 'production', 'terminated'));
    }

    function production()
    {

        $pending = Quotation::selectedQuotations('autorizado', ['deliver']);

        $completed = Quotation::selectedQuotations('terminado', ['deliver']);

        $authorized = Quotation::selectedQuotations('asignado', ['team','deliver']);

        $production = Quotation::selectedQuotations('produccion', ['team','startTime']);

        $terminated = Quotation::selectedQuotations('finalizado', [
            'team', 'startTime', 'endTime'
        ]);

        return view('orders.production', compact('pending', 'completed', 'authorized', 'production', 'terminated'));
    }

    function operator(Request $request)
    {
        $inProduction = Quotation::where('status', 'produccion')->where('team', 'R2')->first();

        if($inProduction) {

            $pending = Order::where('quotation', $inProduction->id)->get(['id', 'type', 'description', 'quotation']);

            return view('orders.operatorListOrders', compact('pending'));

        }

        $pending = Quotation::where('status', 'asignado')->where('team', 'R2')->get([
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
