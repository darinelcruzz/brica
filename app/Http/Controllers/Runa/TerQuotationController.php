<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Client;
use App\Quotation;

class TerQuotationController extends Controller
{
    function create()
    {
        return view('runa.quotations.terminated');
    }

    function store(Request $request)
    {
        $this->validate($request, ['client' => 'required','description' => 'required']);

        $quotation = Quotation::create([
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

            return redirect('cotizaciones');
        }

        return view('runa.quotations.ticket', compact('quotation', 'amount'));
    }
}
