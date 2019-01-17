<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Runa\{RProvider, RShopping, RDeposit};

class ProviderController extends Controller
{
    public function index()
    {
        $providers = RProvider::all();
        return view('runa.providers.index', compact('providers'));
    }

    public function create()
    {
        return view('runa.providers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:r_providers',
            'rfc' => 'required|unique:r_providers'
        ]);

        RProvider::create($request->all());

        return redirect(route('runa.provider.index'));
    }

    public function show(RProvider $rprovider)
    {
        $shoppings = RShopping::where('provider', $rprovider->id)
            ->whereRaw('DATE_FORMAT(date, "%Y") =' . date('Y'))
            ->get();
        return view('runa.providers.show', compact('rprovider', 'shoppings'));
    }

    public function shop(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'unit_price' => 'required',
            'kg' => 'required',
        ]);

        RShopping::create($request->all());

        return back();
    }

    public function deposit(RShopping $rshopping)
    {
        return view('runa.providers.deposit', compact('rshopping'));
    }

    public function pay(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'bank' => 'required',
            'account' => 'required',
            'amount' => 'required',
        ]);

        RDeposit::create($request->all());

        $shopping = RShopping::find($request->shopping);

        $shopping->update([
            'status' => $shopping->pending > 0 ? 'pagado': 'pendiente'
        ]);

        return redirect(route('runa.provider.deposit', ['rshopping' => $request->shopping]));
    }

    public function deposits()
    {
        // $rdeposits = RDeposit::whereRaw('DATE_FORMAT(date, "%Y") =' . date('Y'))->get();
        $rdeposits = RDeposit::all();
        
        return view('runa.providers.deposits', compact('rdeposits'));
    }
}
