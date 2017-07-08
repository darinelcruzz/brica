<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Quotation;
use App\Expense;
use Jenssegers\Date\Date;

class AdminScreenController extends Controller
{
    function index()
    {
        $date = Date::now();

        $sales = Sale::where('created_at', $date)->get();
        $totalS = Sale::totalPaid($date);
        $totalR = Quotation::totalPaid($date);

        return view('sales.balance', compact('sales', 'totalS', 'totalR', 'date'));
    }

    function cash(Request $request)
    {
        $date = $request->date;
        $date = $date == 0 ? Date::now() : $date;

        $paid = Quotation::where('date_payment',$date)->where('status', '!=', 'pendiente')->get();

        $totalP = Quotation::totalPaid($date);
        $totalP = $paid->isEmpty() ? '0': $totalP;

        $expenses = Expense::where('date',$date)->select('description', 'amount')->get();

        $totalE = Expense::totalExpenses($date);
        $totalE = $expenses->isEmpty() ? '0': $totalE;

        $total = $totalP-$totalE;
        return view('quotations.cash', compact('paid', 'totalP', 'expenses', 'totalE', 'date', 'total'));
    }
}
