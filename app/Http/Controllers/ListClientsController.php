<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ListClientsController extends Controller
{
	public function show()
    {
    	$clients = Client::all();

    	return view('clients.show', compact('clients'));
    }
}
