<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Client;
use Jenssegers\Date\Date;

class OrderController extends Controller
{
	public function create()
	{
		$clients = Client::pluck('name', 'id')->toArray();

		return view('orders.create', compact('clients'));
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'team' => 'required',
            'description' => 'required',
    		'design' => 'required',
            'caliber' => 'required',
            'pieces' => 'required',
    	]);

    	$entry = Order::create($request->all());

    	return redirect(route('order.show'));
    }

    public function show()
    {
        $orders = Order::all();

        return view('orders.show', compact('orders'));
    }
}
