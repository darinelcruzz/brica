<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class CreateOrderController extends Controller
{
	public function create()
	{
		return view('orders.create');
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'team' => 'required',
			'client' => 'required',
    		'weight' => 'required',
    		'date' => 'required',
    		'provider' => 'required',
    		'amount' => 'required',
    		'items' => 'required',
    	]);

    	$entry = Order::create($request->all());

    	return redirect(route('order.show'));
    }
}
