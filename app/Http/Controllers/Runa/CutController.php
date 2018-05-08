<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Runa\RCut;
use App\User;

class CutController extends Controller
{
    public function index()
    {
        $runac = User::where('name', 'RC')->first();
        $cuts = RCut::where('order_id', 0)->get();
        return view('runa.orders.index', compact('runac', 'cuts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required',
            'length' => 'required',
            'width' => 'required',
            'caliber' => 'required'
        ]);

        $cut = RCut::create($request->all());

        return back();
    }

    public function calculate(RCut $rcut)
    {
        return view('runa.orders.calculate', compact('rcut'));
    }

    public function edit(RCut $rcut, $status)
    {
        $rcut->update(['status' => $status]);

        return back();
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required'
        ]);

        $rcut = RCut::find($request->id);

        $rcut->update([
            'amount' => $request->amount,
            'status' => 'entregado',
        ]);

        return view('runa.orders.ticket', compact('rcut'));
    }

    public function destroy($id)
    {
        //
    }
}
