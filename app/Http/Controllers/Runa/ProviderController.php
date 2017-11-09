<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Runa\RProvider;
use App\Models\Runa\RShopping;

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
        return view('runa.providers.show', compact('rprovider'));
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
