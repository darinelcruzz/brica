<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Quotation, Sale};

class SaleController extends Controller
{
    function index()
    {
        // dd('Hola');
        $sales = Sale::whereYear('created_at', date('Y'))
            ->orderByDesc('id')
            ->take(50)
            ->get();
        // dd($sales);
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

        $quotation->storeProducts($request);

        if ($quotation->clientr->credit) {
            $quotation->status = 'credito';
            $quotation->save();
        }

        return redirect(route('runa.sale.index'));
    }

    function ticket(Sale $sale)
    {
        return view('runa.sales.ticket', compact('sale'));
    }
}
