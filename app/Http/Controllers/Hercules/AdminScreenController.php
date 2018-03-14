<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use App\Models\Hercules\{HStockSale, HReceipt, HExpense, HDeposit, HGondolaDeposit};

class AdminScreenController extends Controller
{
    function index(Request $request)
    {
        $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;

        $stocksales = HStockSale::todayBalance($date);
        $retainers = HReceipt::todayBalance($date);
        $paid = HReceipt::paidToday($date);
        $expenses = HExpense::todayBalance($date);
        $deposits = HDeposit::todayBalance($date);
        $gdeposits = HGondolaDeposit::todayBalance($date);

        $totalI = 0;
        $totalE = 0;

        return view('hercules.admin.balance',
            compact('stocksales', 'retainers', 'paid', 'date', 'expenses', 'deposits', 'gdeposits', 'totalI', 'totalE')
        );
    }

    function monthly(Request $request)
    {
        $date = $request->input('date', Date::now()->format('Y-m'));
        $stocksales = HStockSale::monthBalance($date);
        $retainers = HReceipt::monthBalance($date);
        $paid = HReceipt::paidThisMonth($date);
        $expenses = HExpense::monthBalance($date);
        $deposits = HDeposit::monthBalance($date);
        $gdeposits = HGondolaDeposit::monthBalance($date);

        $totalI = 0;
        $totalE = 0;

        return view('hercules.admin.monthly',
            compact('stocksales', 'retainers', 'paid', 'expenses', 'deposits', 'gdeposits', 'totalI', 'totalE', 'date')
        );
    }

    function expenses()
	{
        $expenses = HExpense::all();
		$date = Date::now()->format('Y-m-d');
		return view('hercules.admin.expenses', compact('date', 'expenses'));
	}

    function createExpense(Request $request)
	{
		$this->validate($request, [
            'description' => 'required',
    		'amount' => 'required',
    	]);

    	HExpense::create($request->all());

		return redirect(route('hercules.balance.expenses'));
	}

}
