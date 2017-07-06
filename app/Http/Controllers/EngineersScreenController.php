<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;

class EngineersScreenController extends Controller
{
    function index()
    {
        $pending = Quotation::production('autorizado');
        $completed = Quotation::production('terminado');
        $authorized = Quotation::production('asignado');
        $production = Quotation::production('produccion');
        $terminated = Quotation::production('finalizado');

        return view('production.engineers',
            compact('pending', 'completed', 'authorized',
                'production', 'terminated'));
    }

    function ordersReady($id)
    {
        $quotation = Quotation::find($id);
        $quotation->status = 'terminado';
        $quotation->save();

        return back();
    }
}
