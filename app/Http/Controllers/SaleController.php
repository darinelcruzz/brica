<?php

namespace App\Http\Controllers;

use Illuminate\Http\Sale;
use Illuminate\Http\Request;
use App\Order;

class SaleController extends Controller
{
    public function create()
	{
        $terminatedProduction = Order::where('status', 'finalizado')->where('type', 'produccion')->get([
            'id', 'client', 'description',
        ]);

        $terminatedMaquila = Order::where('status', 'finalizado')->where('type', 'maquila')->get([
            'id', 'client', 'description',
        ]);

        return view('sales.create', compact('terminatedProduction', 'terminatedMaquila'));
	}

	public function prepare(Request $request)
    {
        $this->validate($request, [
            'orders' => 'required'
        ]);

    	$checkboxes = $request->orders;
        $ids = $request->ids;

    	return view('sales.prepare', compact('checkboxes', 'ids'));
    }
}
