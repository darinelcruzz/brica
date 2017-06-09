<?php

namespace App\Http\Controllers;

use Illuminate\Http\SaleProduction;
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

     /*public function show()
    {
        $saleProduction = SaleProduction::all();

        return view('saleProduction.show', compact('saleProduction'));
    }

	public function store(Request $request)
    {
    	$this->validate($request, [

    	]);

    	$solicitude = SaleProduction::create($request->all());

    	return redirect(route('saleProduction.show'));
    }*/
}
