<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quotation;
use App\Sale;

class SaleController extends Controller
{
    function index()
    {
        $sales = Sale::all();
        return view('runa.sales.index', compact('sales'));
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

        return redirect(route('runa.sale.index'));
    }

    function ticket($id)
    {
        $sale = Sale::find($id);
        return view('runa.sales.ticket', compact('sale'));
    }
}
