<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Client;
use Carbon\Carbon;

class OrderController extends Controller
{
	public function create()
	{
		$lastId = Order::all()->last()->id;
        $today = Carbon::now();

		return view('orders.create', compact('lastId', 'today'));
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
            'quotation' => 'required',
            'type' => 'required',
            'deliverDate' => 'required',
            'description' => 'required',
            'team' => 'required',
    		'design' => 'required',
            'caliber' => 'required',
            'pieces' => 'required',           
    	]);

    	Order::create($request->all());

    	return redirect(route('production.production'));
    }


	function start(Request $request)
    {
    	$order = Order::find($request->id);
		$order->status = 'produccion';
		$order->startTime = Carbon::now()->format('h:i:s a');
		$order->save();

    	return redirect(route('production.operator'));
    }

	function finish(Request $request)
    {
    	$order = Order::find($request->id);
		$order->status = 'finalizado';
		$order->endTime = Carbon::now()->format('h:i:s a');
		$order->save();

    	return redirect(route('production.operator'));
    }

    function authorizes(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 'autorizado';
        $order->startTime = Carbon::now()->format('h:i:s a');
        $order->save();

        return redirect(route('production.pending'));
    } 
}
