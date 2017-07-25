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

        if ($quotation->clientr->credit) {
            $quotation->storeAsCredit('autorizado', 0);

            return redirect('produccion/ingenieros');
        }

        return view('runa.quotations.ticket', compact('quotation'));
    }
}
