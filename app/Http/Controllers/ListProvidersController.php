<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;

class ListProvidersController extends Controller
{
    public function show()
    {
    	$providers = Provider::all();

    	return view('providers.show', compact('providers'));
    }
}
