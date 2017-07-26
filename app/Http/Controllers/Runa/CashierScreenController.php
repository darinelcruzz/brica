<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quotation;
use App\Sale;
use Jenssegers\Date\Date;

class CashierScreenController extends Controller
{
    function index()
    {
        return view('runa.cashier.index');
    }    

    function showFinished()
    {
        $quotations = Quotation::production('finalizado');

        return view('quotations.finished', compact('quotations'));
    }

    function calculate($id)
    {
        $quotation = Quotation::find($id);
        return view('quotations.calculate', compact('quotation'));
    }
}
