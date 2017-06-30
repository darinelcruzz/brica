<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Expense;

class ExpenseController extends Controller
{
	function create()
	{
		$today = Date::now()->format('Y-m-d');
		return view('expenses.create', compact('today'));
	}

	function store(Request $request)
	{
		$this->validate($request, [
            'description' => 'required',
    		'amount' => 'required',           
    	]);

    	Expense::create($request->all());

		return redirect(route('quotation.cash'));
	}
}
