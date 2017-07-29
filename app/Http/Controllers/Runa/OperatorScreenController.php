<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OperatorScreenController extends Controller
{
    function index()
    {
        $rows = Quotation::where(['team' => Auth::user()->email, 'status' => 'asignado'])
            ->orWhere(['team' => Auth::user()->email, 'status' => 'produccion'])
            ->get();
        $title = 'Cotizaciones';

        return view('runa.production.operator', compact('rows', 'title'));
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

    	return redirect(route('runa.operator'));
    }

    function orders(Quotation $quotation)
    {
        $rows = $quotation->orders;
        $title = 'Ordenes';
        return view('runa.production.operator', compact('rows', 'title'));
    }
}