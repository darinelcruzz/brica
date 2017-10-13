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

    function available()
    {
        $warehouse = HClient::find(1);
        $receipts = $warehouse->receipts;
        session(['url' => '/hercules/disponibles']);

        return view('hercules.receipts.available', compact('receipts'));
    }

    function show(HReceipt $hreceipt)
    {
        return view('hercules.receipts.show', compact('hreceipt'));
    }

    function create()
    {
        $clients = HClient::where('id', '!=', 2)->pluck('name', 'id')->toArray();
        $bodyworks = HBodywork::where('price', 1)->pluck('description', 'id')->toArray();
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
                'deliver' => 'required',
                'amount' => 'required',
                'other' => 'sometimes|required',
                'charge' => 'sometimes|required',
                'process' => 'sometimes|required',
            ]);
        }

        HReceipt::create($request->all());

        return redirect(route('hercules.receipts'));
    }

    function order(HReceipt $hreceipt)
    {
        $order = HOrder::create([
            'bodywork' => $hreceipt->bodywork,
            'receipt' => $hreceipt->id,
            'status' => $hreceipt->process ? 'surtido ' . $hreceipt->process: 'pendiente'
        ]);

        return back();
    }

    function edit(HReceipt $hreceipt)
    {
        $clients = HClient::where('id', '!=', 2)->pluck('name', 'id')->toArray();
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

        return redirect(session('url'));
    }
}
