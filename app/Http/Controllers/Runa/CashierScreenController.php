<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quotation;

class CashierScreenController extends Controller
{
    function index()
    {
        return view('runa.cashier.index');
    }

    function finished()
    {
        return view('runa.cashier.finished');
    }

    function calculate(Quotation $quotation)
    {
        return view('runa.cashier.calculate', compact('quotation'));
    }
}
