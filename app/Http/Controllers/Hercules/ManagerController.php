<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HOrder;

class ManagerController extends Controller
{
    function index()
    {
        return view('hercules.manager.index');
    }

    function assign(Request $request)
    {
        $order = HOrder::find($request->id);
        $order->update([
            "$request->process" => $request->team
        ]);
        return back();
    }
}
