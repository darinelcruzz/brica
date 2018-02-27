<?php

namespace App\Http\Controllers\Hercules;

use App\Http\Controllers\Controller;
use App\Models\Hercules\{HProvider, HShopping, HPayment};
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = HProvider::all();
        return view('hercules.providers.index', compact('providers'));
    }

    public function create()
    {
        return view('hercules.providers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:h_providers',
            'rfc' => 'required|unique:h_providers'
        ]);

        HProvider::create($request->all());

        return redirect(route('hercules.provider.index'));
    }

    public function show(HProvider $hprovider)
    {
        return view('hercules.providers.show', compact('hprovider'));
    }

    public function shop(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'unit_price' => 'required',
            'quantity' => 'required',
            'unity' => 'required',
        ]);

        HShopping::create($request->all());

        return back();
    }

    public function payment(HShopping $hshopping)
    {
        return view('hercules.providers.payment', compact('hshopping'));
    }

    public function pay(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'bank' => 'required',
            'account' => 'required',
            'amount' => 'required',
        ]);

        HPayment::create($request->all());

        $shopping = HShopping::find($request->shopping);

        $shopping->update([
            'status' => $shopping->pending == 0 ? 'pagado': 'pendiente'
        ]);

        return redirect(route('hercules.provider.payment', ['hshopping' => $request->shopping]));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
