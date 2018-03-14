<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\{HGondola, HClient, HGondolaDeposit};

class GondolaController extends Controller
{
    function index()
    {
        $gondolas = HGondola::all();
        return view('hercules.gondolas.index', compact('gondolas'));
    }

    function create()
    {
        return view('hercules.gondolas.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'code' => 'required',
            'price' => 'required'
        ]);

        HGondola::create($request->all());

        return redirect(route('hercules.gondola.index'));
    }

    function edit(HGondola $gondola)
    {
        return view('hercules.gondolas.edit', compact('gondola'));
    }

    function update(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'code' => 'required',
            'price' => 'required'
        ]);

        $gondola = HGondola::find($request->id);

        $gondola->update($request->except(['id']));

        return redirect(route('hercules.gondola.index'));
    }

    function quote(HGondola $gondola)
    {
        $clients = HClient::pluck('name', 'id')->toArray();
        return view('hercules.gondolas.quote', compact('gondola', 'clients'));
    }

    function sell(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required',
        ]);

        $gondola = HGondola::find($request->id);
        $gondola->update([
            'client_id' => $request->client_id,
            'status' => 'vendida'
        ]);

        if ($request->retainer > 0) {
            HGondolaDeposit::create([
                'gondola_id' => $gondola->id,
                'amount' => $request->retainer,
                'description' => 'Anticipo'
            ]);
        }

        return redirect(route('hercules.gondola.index'));
    }

    function printTicket(HGondola $gondola)
    {
        return view('hercules.gondolas.ticket', compact('gondola'));
    }
}
