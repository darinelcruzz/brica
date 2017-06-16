<?php

namespace App\Http\Controllers;

use Illuminate\Http\SaleProduction;
use Illuminate\Http\Request;
use App\Order;

class SaleProductionController extends Controller
{
    public function create()
	{
        $terminatedProduction = Order::where('status', 'finalizado')->where('type', 'produccion')->get([
            'id', 'client', 'description', 'advance'
        ]);

        $terminatedMaquila = Order::where('status', 'finalizado')->where('type', 'maquila')->get([
            'id', 'client', 'description',
        ]);

        return view('salesProduction.create', compact('terminatedProduction', 'terminatedMaquila'));
	}

	public function prepare(Request $request)
    {
        $this->validate($request, [
            'orders' => 'required'
        ]);
        
    	$checkboxes = $request->orders;
        $ids = $request->ids;

    	return view('salesProduction.prepare', compact('checkboxes', 'ids'));
    }
}
