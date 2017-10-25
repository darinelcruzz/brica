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

        $order->updateStatus($status);

        if ($status == 'surtido soldadura') {
            return redirect(route('hercules.warehouse.index'));
        }

        return back();

    }

    function move(Request $request)
    {
        $this->validate($request, ['status' => 'required']);

        $order = HOrder::find($request->id);
        $order->updateStatus($request->status);

        return back();
    }

    function ticket($id, $assigned)
    {
        $personnel = HPersonnel::pluck('name', 'name')->toArray();
        $order = HOrder::find($id);
        return view('hercules.orders.add_to', compact('order', 'personnel', 'assigned'));
    }

    function showTicket($id)
    {
        $order = HOrder::find($id);
        return view('hercules.orders.ticket', compact('order'));
    }

    function update(Request $request)
    {
        $this->validate($request, [
            'serial_number' => 'sometimes|required',
            'welding' => 'sometimes|required',
            'supervisor' => 'sometimes|required',
        ]);

        $order = HOrder::find($request->id);

        $order->update($request->except(['id']));

        if ($order->status == 'interno') {
            return redirect(route('hercules.warehouse.semis'));
        }
        return redirect(route('hercules.production.index'));
    }
}
