<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quotation;
use App\Models\Runa\RCut;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OperatorScreenController extends Controller
{
    function index()
    {
        $authUser = Auth::user();
        $rows = Quotation::where([
                ['status', '=', 'asignado'],
                ['team', '=', $authUser->email],
            ])
            ->orWhere([
                ['status', '=', 'produccion'],
                ['team', '=', $authUser->email],
            ])
            ->with('team')
            ->get();
        $title = 'Cotizaciones';
        $cuts = RCut::with('team')->get();

        return view('runa.production.operator', compact('rows', 'title', 'cuts', 'authUser'));
    }

    function start(Quotation $quotation)
    {
		$quotation->update([
            'status' => 'produccion',
            'startTime' => Carbon::now()->format('h:i:s a')
        ]);

    	return redirect(route('runa.operator.orders', ['id' => $quotation->id]));
    }

    function finish(Quotation $quotation)
    {
        $quotation->update([
            'status' => 'finalizado',
            'endTime' => Carbon::now()->format('h:i:s a')
        ]);

    	return redirect(route('runa.operator.index'));
    }

    function orders(Quotation $quotation)
    {
        $rows = $quotation->orders;
        $id = $quotation->id;
        $title = 'Ordenes';
        return view('runa.production.operator', compact('rows', 'title', 'id'));
    }
}
