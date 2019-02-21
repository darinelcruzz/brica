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
        $finished = Quotation::where('type', 'produccion')
            ->whereYear('date_payment', date('Y'))
            ->where('status', 'finalizado')
            ->get();
        return view('runa.cashier.finished', compact('finished'));
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
