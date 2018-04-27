<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use App\{Sale, Quotation, Expense};

class AdminScreenController extends Controller
{
    function balance(Request $request)
    {
        $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;
        $quotations = Quotation::inBalance($date);
        $expenses = Expense::where('date', $date)->get();
        $totals = $this->getTotals($quotations, $expenses);
        $sales = Sale::all();

        return view('runa.admin.balance', compact('quotations', 'expenses',
                        'date', 'totals', 'sales'));
    }

    function monthly(Request $request)
    {
        $date = $request->input('date', Date::now()->format('Y-m'));
        $quotations = Quotation::monthBalance($date);
        $expenses = Expense::monthBalance($date);

        $totalI = 0;
        $totalE = 0;

        return view('runa.admin.monthly', compact('quotations', 'expenses', 'totalI', 'totalE', 'date'));
    }

    function manage()
    {
        $quotations = Quotation::where('status', '!=', 'pagado')
            ->where('status', '!=', 'cancelado')->get();

        return view('runa.admin.delete', compact('quotations'));
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

    function expenses(Request $request)
	{
        $this->validate($request, [
            'description' => 'sometimes|required',
    		'amount' => 'sometimes|required',
    	]);

        if ($request->input('description')) {
            $expense = Expense::create($request->all());

            $expense->notify(new \App\Notifications\TestNotification());
        }

        $expenses = Expense::all();
		$date = Date::now()->format('Y-m-d');
		return view('runa.admin.expenses', compact('date', 'expenses'));
	}

    // function steal()
    // {
    //     $sales = Sale::all();

    //     return view('runa.admin.steal', compact('sales'));
    // }
}
