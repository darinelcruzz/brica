<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientController extends Controller
{
    public function create($from = null)
	{
		return view('runa.clients.create', compact('from'));
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|unique:clients',
    		'city' => 'required',
    		'phone' => 'required',

    	]);

    	Client::create($request->all());

		if ($request->from === 'terminado') {
			return redirect(route('quotation.create'));
		} elseif ($request->from === 'produccion') {
			return redirect(route('quotation.make'));
		} else {
			return redirect('runa/clientes');
		}
    }

    function index()
    {
        $clients = Client::all();
        return view('runa.clients.index', compact('clients'));
    }

	function edit(Client $client)
    {
        return view('runa.clients.edit', compact('client'));
	}

    public function change(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
    		'city' => 'required',
    		'phone' => 'required',
        ]);

        Client::find($request->id)->update($request->all());

        return $this->index();
    }

	function destroy($id)
	{
		Client::destroy($id);

		return back();
	}
}
