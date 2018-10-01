<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quotation;
use App\Models\Runa\RCut;
use Jenssegers\Date\Date;

class CashierScreenController extends Controller
{
    function index()
    {
        return view('runa.cashier.index');
    }

    function finished()
    {
        $cuts = RCut::where('order_id', 0)->where('status', 'terminado')->get();
        $finished = Quotation::production('finalizado');
        return view('runa.cashier.finished', compact('cuts', 'finished'));
    }

    function paid()
    {
        $paid = Quotation::where('status', '!=', 'pendiente')
            ->where('status', '!=', 'cancelado')
            ->get();
        return view('runa.cashier.paid', compact('paid'));
    }

    function calculate(Quotation $quotation)
    {
        return view('runa.cashier.calculate', compact('quotation'));
    }
}
