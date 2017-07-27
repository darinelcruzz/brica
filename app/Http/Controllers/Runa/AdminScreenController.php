<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sale;
use App\Quotation;
use App\Expense;
use Jenssegers\Date\Date;

class AdminScreenController extends Controller
{
    function index(Request $request)
    {
        $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;

        $quotations = Quotation::inBalance($date);

        $expenses = Expense::where('date', $date)->get();

        $totals = $this->getTotals($quotations, $expenses);

        $sales = Sale::all();

        return view('runa.balance', compact('quotations', 'expenses',
                        'date', 'totals', 'sales'));
    }

    function getTotals($quotations, $expenses)
    {
        $totals = ['totalQ' => 0, 'totalE' => 0];

        foreach ($quotations as $quotation) {
            $totals['totalQ'] += $quotation->amount;
        }

        foreach ($expenses as $expense) {
            $totals['totalE'] += $expense->amount;
        }

        return $totals;
    }
}
