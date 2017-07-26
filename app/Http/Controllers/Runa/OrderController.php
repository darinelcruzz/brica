<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function create($quotation)
	{
		$links = $this->getDesigns();
        $today = Carbon::now();

		return view('runa.orders.create', compact('quotation', 'today', 'links'));
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
			$filename = str_random(40);
			$ext = $file->extension();
			$file->storeAs('public/temp', "$filename.$ext");

			$order->added = Storage::url("temp/$filename.$ext");
			$order->save();
		}

    	return redirect(route('production.engineers'));
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

	function details($id)
    {
        $order = Order::find($id);
        return view('orders.details', compact('order'));
    }

	function deleteOrder($id)
	{
		Order::destroy($id);

		return redirect('cotizaciones/listado');
	}
}
