<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quotation;

class EngineersScreenController extends Controller
{
    function index()
    {
        return view('runa.production.engineers');
    }

    function ordersReady(Quotation $quotation)
    {
        $quotation->update(['status' => 'terminado']);

        return back();
    }
}
