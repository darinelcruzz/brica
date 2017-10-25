<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HOrder;

class ProductionController extends Controller
{
    function index()
    {
        session(['url' => '/hercules/produccion']);
        return view('hercules.production.index');
    }

    function assign(Request $request)
    {
        $order = HOrder::find($request->id);
        $order->update([
            "$request->process" => $request->team
        ]);
        return back();
    }

    function done()
    {
        return view('hercules.production.done');
    }

    function finished()
    {
        $orders = HOrder::where('status', 'terminado')->get();
        $paid = HOrder::where('status', 'pagado')->get();
        return view('hercules.production.finished', compact('orders', 'paid'));
    }

    function ticket(HOrder $horder)
    {
        return view('hercules.production.ticket', compact('horder'));
    }
}
