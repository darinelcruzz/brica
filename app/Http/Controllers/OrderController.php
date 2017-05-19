<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Jenssegers\Date\Date;

class OrderController extends Controller
{
	public function create()
	{
		return view('orders.create');
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'team' => 'required',
            'description' => 'required',
    		'design' => 'required',
            'caliber' => 'required',
            'measure' => 'required',
            'pieces' => 'required',
            'height' => 'required',
            'long' => 'required',
            'width' => 'required',
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
