<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Quotation, Sale};

class SaleController extends Controller
{
    function index()
    {
        $sales = Sale::whereYear('created_at', date('Y'))
            ->with('quotationr.clientr')
            ->orderByDesc('id')
            ->get();
        return view('runa.sales.index', compact('sales'));
    }

    function save(Request $request)
    {
        $sale = Sale::create([
            'quotation' => $request->quotation,
            'retainer' => $request->retainer,
            'amount' => $request->amount + $request->retainer
        ]);

        $quotation = Quotation::find($request->quotation);

        $quotation->storeProducts($request);

        if ($quotation->clientr->credit) {
            $quotation->status = 'credito';
            $quotation->save();
        }

        return redirect(route('runa.sale.ticket', $sale));
    }

    function ticket(Sale $sale)
    {
        return view('runa.sales.ticket', compact('sale'));
    }
}
