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
        $horder = HOrder::find($id);

        $horder->update([
            'status' => $status,
            'startDate' => $status == 'soldadura' ? Date::now()->format('Y-m-d H:i:s') : null,
            'endDate' => $status == 'terminado' ? Date::now()->format('Y-m-d H:i:s') : null,
        ]);

        return back();
    }
}
