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
        $orders = HOrder::where('status', '!=', 'terminado')
                        ->where('status', '!=', 'interno')
                        ->where('status', '!=', 'cancelada')
                        ->get();

        return view('hercules.warehouse.index', compact('orders'));
    }

    function show(HOrder $horder, HBodywork $hbodywork)
    {
        $status = [
            'pendiente', 'surtido soldadura', 'soldadura', 'surtido fondeo', 'fondeo',
            'surtido vestido', 'vestido', 'surtido pintura', 'pintura',
            'surtido montaje', 'montaje', 'terminado'
        ];

        $processes = [
            'welding' => 'soldadura',
            'anchoring' => 'fondeo',
            'clothing' => 'vestido',
            'painting' => 'pintura',
            'mounting' => 'montaje'
        ];

        return view('hercules.warehouse.show', compact('hbodywork', 'horder', 'status', 'processes'));
    }

    function inventory()
    {
        $inventory = HOrder::where('status', 'interno')->get();
        session(['url' => '/hercules/semiterminados']);

        return view('hercules.warehouse.inner', compact('inventory'));
    }

    function orders()
    {
        $orders = HOrder::where('status', '!=', 'cancelada');

        return view('hercules.warehouse.historial', compact('orders'));
    }
}
