<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
	public function create()
	{
		return view('clients.create');
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'city' => 'required',
    		'phone' => 'required',

    	]);

    	$client = Client::create($request->all());

    	return redirect(route('client.show'));
    }

    public function show()
    {
        $clients = Client::get([
            'id', 'name', 'rfc', 'city', 'phone', 'email', 'contact'
        ]);

        return view('clients.show', compact('clients'));
    }
}
