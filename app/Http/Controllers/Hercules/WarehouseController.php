<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HOrder;
use App\Models\Hercules\HBodywork;

class WarehouseController extends Controller
{
    function index()
    {
        $orders = HOrder::where('status', '!=', 'terminado')->get();
        return view('hercules.warehouse.index', compact('orders'));
    }

    function show(HOrder $horder, HBodywork $hbodywork)
    {
        return view('hercules.warehouse.show', compact('hbodywork', 'horder'));
    }
}
