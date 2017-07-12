<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\Sale;

class SaleController extends Controller
{
    function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    function save(Request $request)
    {
        Sale::create([
            'quotation' => $request->quotation,
            'retainer' => $request->retainer,
            'amount' => $request->amount + $request->retainer
        ]);

        $quotation = Quotation::find($request->quotation);

        if ($quotation->clientr->credit) {
            $quotation->status = 'credito';
            $quotation->save();
        }

        return redirect(route('sale.index'));
    }

    function printTicket($id)
    {
        $sale = Sale::find($id);
        return view('sales.print', compact('sale'));
    }
}
