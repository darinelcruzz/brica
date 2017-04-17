<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateOrderController extends Controller
{
	public function create()
	{
		return view('orders.create');
	}
}
