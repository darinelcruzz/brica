<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quotation;
use Jenssegers\Date\Date;

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

    function changeToTimestamp()
    {
        $quotations = Quotation::all();

        foreach($quotations as $quotation) {
            if ($quotation->payment_date) {
                $quotation->update([
                    'date_payment' => Date::createFromFormat('Y-m-d H:i:s', $quotation->payment_date)->format('Y-m-d')
                ]);
            }
        }

        return 'Done';
    }
}
