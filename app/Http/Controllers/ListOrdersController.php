<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Quotation;

class ListOrdersController extends Controller
{
    function cashier()
    {
        $status = Quotation::where('status', '!=', 'pendiente')->get([
            'quotation', 'client', 'id', 'status', 'description', 'team', 'deliver_date'
        ]);

        return view('orders.cashier', compact('status'));
    }
}
