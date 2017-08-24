<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HOrder;

class WarehouseController extends Controller
{
    function index()
    {
        $orders = HOrder::where('status', 'pendiente')->get();
        return view('hercules.warehouse.index', compact('orders'));
    }
}
