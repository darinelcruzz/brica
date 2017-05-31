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
		$lastId = Order::all()->last()->id;

		return view('orders.create', compact('lastId'));
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
            'description' => 'required',
    		'design' => 'required',
            'caliber' => 'required',
            'pieces' => 'required',
            'type' => 'required',
            'client' => 'required',
            'team' => 'required',
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
