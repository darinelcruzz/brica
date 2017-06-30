<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Quotation;

class ListOrdersController extends Controller
{

    function pending()
    {
        $pending = Quotation::selectedQuotations('pendiente', ['deliver_date']);

        $completed = Quotation::selectedQuotations('llenada', ['deliver_date']);

        $authorized = Quotation::selectedQuotations('asignado', ['team','deliver_date']);

        $production = Quotation::selectedQuotations('produccion', ['team','startTime']);

        $terminated = Quotation::selectedQuotations('finalizado', [
            'team','orders', 'startTime', 'endTime'
        ]);


        return view('orders.pending', compact('pending', 'completed', 'authorized', 'production', 'terminated'));
    }

    function production()
    {

        $pending = Quotation::selectedQuotations('pendiente', ['deliver_date']);

        $completed = Quotation::selectedQuotations('llenada', ['deliver_date']);

        $authorized = Quotation::selectedQuotations('asignado', ['team','deliver_date']);

        $production = Quotation::selectedQuotations('produccion', ['team','startTime']);

        $terminated = Quotation::selectedQuotations('finalizado', [
            'team','orders', 'startTime', 'endTime'
        ]);

        return view('orders.production', compact('pending', 'completed', 'authorized', 'production', 'terminated'));
    }

    function operator(Request $request)
    {
        $inProduction = Quotation::where('status', 'produccion')->where('team', 'R2')->first();

        if($inProduction) {

            $pending = Quotation::where('status', 'produccion')->where('team', 'R2')->first();

            return view('orders.operator', compact('pending'));
            
        }

        $pending = Quotation::where('status', 'asignado')->where('team', 'R2')->get([
                'id','type', 'description', 'deliver_date'
            ]);
        
        return view('orders.operatorList', compact('pending'));
        
    }

    function cashier()
    {
        $status = Quotation::where('status', '!=', 'pendiente')->get([
            'quotation', 'client', 'id', 'status', 'description', 'team', 'deliver_date'
        ]);

        return view('orders.cashier', compact('status'));
    }

}
