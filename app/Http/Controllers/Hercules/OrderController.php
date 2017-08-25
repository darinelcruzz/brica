<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HOrder;
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
}
