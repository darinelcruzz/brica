<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HBodywork;
use App\Models\Hercules\HClient;
use App\Models\Hercules\HReceipt;

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
        return view('hercules.receipts.create', compact('clients', 'bodyworks'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'client' => 'required',
            'bodywork' => 'required',
            'color' => 'required',
            'retainer' => 'required',
            'deliver' => 'required'
        ]);

        HReceipt::create($request->all());

        return redirect(route('hercules.receipts'));
    }
}
