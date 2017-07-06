<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Order;
use App\Client;
use App\Quotation;
use Carbon\Carbon;

class OrderController extends Controller
{
	public function create($cot)
	{
        $quotation = $cot;
		$links = $this->getDesigns();
        $today = Carbon::now();

		return view('orders.create', compact('quotation', 'today', 'links'));
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
            'type' => 'required',
            'description' => 'required',
    		'design' => 'required',
            'caliber' => 'required',
            'pieces' => 'required',
    	]);

    	$order = Order::create($request->all());

		if ($order->design == 'nuevo') {
			$file = $request->new_design;
			$filename = $request->new_design_name;
			$ext = $file->extension();
			$file->storeAs('public/temp', "$filename.$ext");

			$order->added = Storage::url("temp/$filename.$ext");
			$order->save();
		}

    	return redirect(route('production.production'));
    }


	function start(Request $request)
    {
    	$order = Quotation::find($request->id);
		$order->status = 'produccion';
		$order->startTime = Carbon::now()->format('h:i:s a');
		$order->save();

    	return redirect(route('production.operator'));
    }

	function finish(Request $request)
    {
    	$order = Quotation::find($request->id);
		$order->status = 'finalizado';
		$order->endTime = Carbon::now()->format('h:i:s a');
		$order->save();

    	return redirect(route('production.operator'));
    }

    function add(Request $request)
    {
        $quotation = $request->id;
        return view('production.create', compact('quotation'));
    }

	public function getDesigns()
	{
		$files = Storage::files('public/designs');
		$links = [];
		foreach ($files as $file) {
			$links[Storage::url($file)] = substr(Storage::url($file), 17);
		}

		return $links;
	}
}
