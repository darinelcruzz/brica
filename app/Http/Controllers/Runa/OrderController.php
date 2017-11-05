<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use App\Order;
use App\Quotation;

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

        if($order->type == 'corte') {
            Quotation::find($request->quotation)
                ->update(['status' => 'produccion', 'team' => 'RC']);
        }

		if ($order->design == 'nuevo') {
			$file = $request->new_design;
			$filename = Date::now()->format('Ymdhis') . 'Q' . $order->quotation;
			$ext = $file->extension();
			$file->storeAs('public/temp', "$filename.$ext");

			$order->added = Storage::url("temp/$filename.$ext");
			$order->save();
		}

    	return redirect(route('runa.engineer'));
    }

    function show(Order $order)
    {
        return view('runa.orders.show', compact('order'));
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

	function destroy($id)
	{
		Order::destroy($id);

		return back();
	}
}
