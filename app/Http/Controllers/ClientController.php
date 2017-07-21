<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
	public function create($from = null)
	{
		return view('clients.create', compact('from'));
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|unique:clients',
    		'city' => 'required',
    		'phone' => 'required',

    	]);

    	$client = Client::create($request->all());

		if ($request->from === 'terminado') {
			return redirect(route('quotation.create'));
		} elseif ($request->from === 'produccion') {
			return redirect(route('quotation.make'));# code...
		} else {
			return redirect('clientes');
		}
    }

    public function show()
    {
        $clients = Client::all();
        return view('clients.show', compact('clients'));
    }

	public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
	}

    public function change(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
    		'city' => 'required',
    		'phone' => 'required',
        ]);

        Client::find($request->id)->update($request->all());

        return $this->show();
    }

	function deleteClient($id)
	{
		Client::destroy($id);

		return back();
	}
}
