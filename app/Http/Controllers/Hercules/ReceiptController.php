<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HBodywork;
use App\Models\Hercules\HOrder;
use App\Models\Hercules\HClient;
use App\Models\Hercules\HReceipt;
use Jenssegers\Date\Date;

class ReceiptController extends Controller
{
    function index()
    {
        $receipts = HReceipt::all();
        return view('hercules.receipts.index', compact('receipts'));
    }

    function show(HReceipt $hreceipt)
    {
        return view('hercules.receipts.show', compact('hreceipt'));
    }

    function create()
    {
        $clients = HClient::pluck('name', 'id')->toArray();
        $bodyworks = HBodywork::pluck('description', 'id')->toArray();
        $today = Date::now();
        return view('hercules.receipts.create', compact('clients', 'bodyworks', 'today'));
    }

    function store(Request $request)
    {
        if ($request->client == 1) {
            $this->validate($request, [
                'client' => 'required',
                'bodywork' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'client' => 'required',
                'bodywork' => 'required',
                'color' => 'required',
                'retainer' => 'required',
                'deliver' => 'required'
            ]);
        }

        HReceipt::create($request->all());

        return redirect(route('hercules.receipts'));
    }

    function order(HReceipt $hreceipt)
    {
        HOrder::create([
            'bodywork' => $hreceipt->bodywork,
            'receipt' => $hreceipt->id
        ]);

        return back();
    }

    function edit(HReceipt $hreceipt)
    {
        $clients = HClient::pluck('name', 'id')->toArray();
        $bodyworks = HBodywork::pluck('description', 'id')->toArray();
        $today = Date::now();

        return view('hercules.receipts.edit', compact('hreceipt', 'clients', 'bodyworks', 'today'));
    }

    function update(Request $request)
    {
        $this->validate($request, [
            'client' => 'required',
            'color' => 'required',
            'retainer' => 'required',
            'deliver' => 'required'
        ]);

        HReceipt::find($request->id)
            ->update($request->all());

        return redirect(route('hercules.semis'));
    }
}
