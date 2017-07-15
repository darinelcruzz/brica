<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OperatorScreenController extends Controller
{
    function showQuotations()
    {
        $rows = Quotation::where(['team' => Auth::user()->email, 'status' => 'asignado'])
            ->orWhere(['team' => Auth::user()->email, 'status' => 'produccion'])
            ->get();
        $title = 'Cotizaciones';

        return view('production.operators', compact('rows', 'title'));
    }

    function showOrders($id)
    {
        $rows = Quotation::find($id)->orders;
        $title = 'Ordenes';
        return view('production.operators', compact('rows', 'title'));
    }

    function start($id)
    {
    	$order = Quotation::find($id);
		$order->status = 'produccion';
		$order->startTime = Carbon::now()->format('h:i:s a');
		$order->save();

    	return redirect(route('production.orders', ['id' => $id]));
    }

    function finish($id)
    {
    	$order = Quotation::find($id);
		$order->status = 'finalizado';
		$order->endTime = Carbon::now()->format('h:i:s a');
		$order->save();

    	return redirect(route('production.operator'));
    }
}
