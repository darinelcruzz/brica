<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use App\Client;
use App\Quotation;

class ProQuotationController extends Controller
{
    function create()
    {
        return view('runa.quotations.production');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'client' => 'required',
            'description' => 'required',
            'deliver' => 'required'
        ]);

        $quotation = Quotation::create($request->all());

        if ($quotation->clientr->credit && $quotation->amount == 0) {
            $quotation->storeAsCredit('autorizado', 0);
            return redirect('runa/ingenieros');
        }

        return view('runa.quotations.ticket', compact('quotation'));
    }

    function retainer(Quotation $quotation)
    {
        $quotation->update([
            'status' => 'autorizado',
            'date_payment' => Date::now()->format('Y-m-d')
        ]);

        return back();
    }

    function pay(Quotation $quotation)
    {
        $quotation->update(['status' => 'pagado']);
        return back();
    }

    function details(Quotation $quotation)
    {
        return view('runa.quotations.details', compact('quotation'));
    }
}
