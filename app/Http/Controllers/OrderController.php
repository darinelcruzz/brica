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

    	return redirect(route('order.production'));
    }

	public function pay(Request $request)
    {
    	$this->validate($request, [
            'advance' => 'required',
    	]);

    	$order = Order::find($request->id);
		$order->advance = $request->advance;
		$order->status = 'autorizado';
		$order->save();

    	return redirect(route('order.pending'));
    }

	public function start(Request $request)
    {
    	$order = Order::find($request->id);
		$order->status = 'produccion';
		$order->startTime = Carbon::now()->format('h:i:s a');
		$order->save();

    	return redirect(route('order.operator'));
    }

	public function finish(Request $request)
    {
    	$order = Order::find($request->id);
		$order->status = 'finalizado';
		$order->endTime = Carbon::now()->format('h:i:s a');
		$order->save();

    	return redirect(route('order.operator'));
    }

    public function authorizes(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 'autorizado';
        $order->startTime = Carbon::now()->format('h:i:s a');
        $order->save();

        return redirect(route('order.pending'));
    } 
}
