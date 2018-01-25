<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use App\Client;
use App\User;
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

        $lastQ = Quotation::all()->last();

        $quotation = Quotation::create($request->all());

        $quotation->update([
            'folio' => $lastQ->folio + 1
        ]);

        if ($quotation->clientr->credit && $quotation->amount == 0) {
            $quotation->storeAsCredit('autorizado', 0);
            return redirect('runa/ingenieros');
        }

        if ($quotation->amount > 1000) {
            $quotation->notify(new \App\Notifications\QuotationAboveAThousand());
        }

        return view('runa.quotations.ticket', compact('quotation'));
    }

    function retainer(Quotation $quotation)
    {
        $quotation->update([
            'status' => 'autorizado',
            'date_payment' => Date::now()->format('Y-m-d'),
            'payment_date' => Date::now()
        ]);

        return back();
    }

    function pay(Quotation $quotation)
    {
        $quotation->update([
            'status' => 'pagado',
            'notified' => 1
        ]);
        return back();
    }

    function notify(Quotation $quotation)
    {
        $quotation->update(['notified' => 1]);
        return back();
    }

    function details(Quotation $quotation)
    {
        return view('runa.quotations.details', compact('quotation'));
    }

    function edit(Quotation $quotation)
    {
        $teams = User::where('level', '5')->get();
        return view('runa.quotations.edit', compact('quotation', 'teams'));
    }

    function change(Request $request)
    {
        Quotation::find($request->id)->update(['team' => $request->team]);
        return redirect(route('runa.manager'));
    }
}
