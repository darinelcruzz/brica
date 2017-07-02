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
		}

		return redirect(route('quotation.make'));
    }

    public function show()
    {
        $clients = Client::get([
            'id', 'name', 'rfc', 'city', 'phone', 'email', 'contact'
        ]);

        return view('clients.show', compact('clients'));
    }
}
