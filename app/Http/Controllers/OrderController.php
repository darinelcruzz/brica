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
			$order->advance = 'N/A';
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

    	return redirect(route('order.operator'));
    }

    public function operator(Request $request)
    {
        $actual = Order::where('status', 'produccion')->where('team', 'H1')->get([
            'id', 'client'
        ])->take(1);

        $uno = $actual[0];

        return view('orders.operator', compact('uno'));
    }

    
}
