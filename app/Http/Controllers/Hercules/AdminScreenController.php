<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use App\Models\Hercules\HStockSale;
use App\Models\Hercules\HReceipt;
use App\Models\Hercules\HExpense;

class AdminScreenController extends Controller
{
    function index(Request $request)
    {
        $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;

        $stocksales = HStockSale::todayBalance($date);
        $receipts = HReceipt::todayBalance($date);
        $expenses = HExpense::todayBalance($date);

        $totalI = 0;
        $totalE = 0;

        return view('hercules.admin.balance', compact('stocksales', 'receipts', 'date', 'expenses', 'totalI', 'totalE'));
    }

    function monthly(Request $request)
    {
        $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;

        $stocksales = HStockSale::todayBalance($date);
        $receipts = HReceipt::todayBalance($date);
        $expenses = HExpense::todayBalance($date);

        $totalI = 0;
        $totalE = 0;

        return view('hercules.admin.monthly', compact('stocksales', 'receipts', 'date', 'expenses', 'totalI', 'totalE'));
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

		return redirect(route('hercules.expenses'));
	}

}
