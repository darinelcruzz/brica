<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HOrder;
use App\Models\Hercules\HPersonnel;
use Jenssegers\Date\Date;

class OrderController extends Controller
{
    function status($id, $status)
    {
        $order = HOrder::find($id);

        $order->update([
            'status' => $status,
            'startDate' => $status == 'soldadura' ? Date::now()->format('Y-m-d H:i:s') : $order->startDate,
            'endDate' => $status == 'terminado' ? Date::now()->format('Y-m-d H:i:s') : $order->endDate,
        ]);

        if ($status == 'surtido soldadura') {
            return redirect(route('hercules.warehouse'));
        }

        return back();

    }

    function ticket($id)
    {
        $personnel = HPersonnel::pluck('name', 'name')->toArray();
        $order = HOrder::find($id);
        return view('hercules.orders.add_to', compact('order', 'personnel'));
    }

    function showTicket($id)
    {
        $order = HOrder::find($id);
        return view('hercules.orders.ticket', compact('order'));
    }

    function update(Request $request)
    {
        $this->validate($request, [
            'serial_number' => 'required',
            'welding' => 'required',
            'supervisor' => 'required',
        ]);

        $order = HOrder::find($request->id);

        $order->update([
            'serial_number' => $request->serial_number,
            'brand' => $request->brand,
            'model' => $request->model,
            'chasis' => $request->chasis,
            'floor' => $request->floor,
            'welding' => $request->welding,
            'clothing_spec' => $request->clothing_spec,
            'supervisor' => $request->supervisor,
        ]);

        return redirect(route('hercules.production'));
    }
}
