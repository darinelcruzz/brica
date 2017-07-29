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

    function manage()
    {
        $quotations = Quotation::where('status', '!=', 'pagado')
            ->where('status', '!=', 'cancelado')->get();

        return view('runa.delete', compact('quotations'));
    }

    function cancel(Quotation $quotation)
    {
        $quotation->update(['status' => 'cancelado']);
        
        return back();
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

    function expenses()
	{
        $expenses = Expense::all();
		$date = Date::now()->format('Y-m-d');
		return view('runa.expenses', compact('date', 'expenses'));
	}

	function addExpense(Request $request)
	{
		$this->validate($request, [
            'description' => 'required',
    		'amount' => 'required',
    	]);

    	Expense::create($request->all());

		return redirect(route('runa.expenses'));
	}
}
