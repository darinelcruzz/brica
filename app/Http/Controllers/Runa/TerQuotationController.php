<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\{Client, Sale, Quotation};

class TerQuotationController extends Controller
{
    function create()
    {
        return view('runa.quotations.terminated');
    }

    function store(Request $request)
    {
        $this->validate($request, ['client' => 'required','description' => 'required']);

        $lastQ = Quotation::latest()->first();

        $quotation = Quotation::create([
            'folio' => $lastQ->folio + 1,
            'type' => $request->type,
            'client' => $request->client,
            'status' => $request->status,
            'description' => $request->description,
            'amount' => $request->amount
        ]);

        $amount = $request->amount;

        $quotation->storeProducts($request);

        if ($quotation->clientr->credit) {
            $quotation->storeAsCredit('credito', $quotation->amount);
        }

        if ($quotation->amount > 1000 && env('APP_ENV') != 'local') {
            $quotation->notify(new \App\Notifications\QuotationAboveAThousand());
        }

        return view('runa.quotations.ticket', compact('quotation', 'amount'));
    }

    function pay(Quotation $quotation)
    {
        $quotation->update([
            'status' => 'pagado',
            'date_payment' => Date::now()->format('Y-m-d'),
            'payment_date' => Date::now()
        ]);

        Sale::create([
            'quotation' => $quotation->id,
            'retainer' => $quotation->amount,
            'amount' => $quotation->amount
        ]);

        return back();
    }
}
