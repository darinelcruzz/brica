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

		return view('orders.create', compact('lastId'));
	}

	public function show()
    {
        $orders = Order::all();

        return view('orders.show', compact('orders'));
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

    	Order::create($request->all());

        $order = Order::all()->last();

        if($order->type == 'maquila') {
            $order->status = 'autorizado';
            $order->save();
        }

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

    	return redirect(route('order.production'));
    }

	public function finish(Request $request)
    {
    	$order = Order::find($request->id);
		$order->status = 'finalizado';
		$order->endTime = Carbon::now()->format('h:i:s a');
		$order->save();

    	return redirect(route('order.production'));
    }

	public function showPending()
    {
        $pending = Order::where('status', 'pendiente')->get([
			'id', 'client', 'type', 'description', 'team'
		]);
		$authorized = Order::where('status', 'autorizado')->get([
			'id', 'client', 'type', 'description', 'team', 'advance'
		]);
		$terminated = Order::where('status', 'finalizado')->get([
			'id', 'client', 'type', 'description', 'team', 'pieces', 'startTime', 'endTime'
		]);

        return view('orders.pending', compact('pending', 'authorized', 'terminated'));
    }

    public function showProduction()
    {
        $authorized = Order::where('status', '=', 'autorizado')->get([
			'id', 'client', 'type', 'description', 'team'
		]);
        $production = Order::where('status', '=', 'produccion')->get([
			'id', 'client', 'type', 'description', 'team', 'startTime'
		]);

        return view('orders.production', compact('authorized', 'production'));
    }
}
