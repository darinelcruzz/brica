<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HOrder;

class ProductionController extends Controller
{
    function index()
    {
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

    function ticket(HOrder $horder)
    {
        return view('hercules.production.ticket', compact('horder'));
    }
}
