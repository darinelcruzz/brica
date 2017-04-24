<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class ListOrdersController extends Controller
{
    public function show()
    {
    	$orders = Order::all();

    	return view('orders.show', compact('orders'));
    }
}
