<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HBodywork;
use App\Models\Hercules\HOrder;
use App\Models\Hercules\HClient;
use App\Models\Hercules\HReceipt;
use App\Models\Hercules\HDeposit;
use Jenssegers\Date\Date;

class ReceiptController extends Controller
{
    function index()
    {
        $receipts = HReceipt::all();
        session(['url' => '/hercules/recibos']);
        return view('hercules.receipts.index', compact('receipts'));
    }

    function available()
    {
        $warehouse = HClient::find(1);
        $comitan = $warehouse->receipts->where('location', 'comitán');
        $palenque = $warehouse->receipts->where('location', 'palenque');
        session(['url' => '/hercules/recibos/disponibles']);

        return view('hercules.receipts.available', compact('comitan', 'palenque'));
    }

    function deposits()
    {
        $receipts = HReceipt::where('client', '!=', 1)->get();
        session(['url' => '/hercules/recibos/abonos']);

        return view('hercules.receipts.deposits', compact('receipts'));
    }

    function sold(Request $request)
    {
        $receipts = HReceipt::where('client', '!=', 1)->get();

        return view('hercules.receipts.sold', compact('receipts'));
    }

    function deposit(Request $request)
    {
        HDeposit::create($request->all());

        return redirect(session('url'));
    }

    function show(HReceipt $hreceipt)
    {
        return view('hercules.receipts.show', compact('hreceipt'));
    }

    function create()
    {
        $clients = HClient::where('id', '!=', 2)->pluck('name', 'id')->toArray();
        $trucks = HBodywork::where('price', 1)->where('type', 'redila')->pluck('description', 'id')->toArray();
        $trailers = HBodywork::where('price', 1)->where('type', 'remolque')->pluck('description', 'id')->toArray();
        $today = Date::now();
        return view('hercules.receipts.create', compact('clients', 'trucks', 'trailers', 'today'));
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
                'bodywork' => 'sometimes|required',
                'color' => 'sometimes|required',
                'deliver' => 'required',
                'amount' => 'required',
                'other' => 'sometimes|required',
                'charge' => 'sometimes|required',
                'process' => 'sometimes|required',
            ]);
        }

        HReceipt::create($request->all());

        return redirect(route('hercules.receipt.index'));
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
            'retainer' => 'required',
            'deliver' => 'required'
        ]);

        $receipt = HReceipt::find($request->id);
        $receipt->update($request->all());

        return redirect(session('url'));
    }

    function export($id, $location)
    {
        HReceipt::find($id)->update([
            'location' => $location
        ]);

        return redirect(session('url'));
    }
}
