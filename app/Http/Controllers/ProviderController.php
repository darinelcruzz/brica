<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;

class ProviderController extends Controller
{
    public function create()
	{
		return view('providers.create');
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'city' => 'required',
    		'phone' => 'required',

    	]);

    	$provider = Provider::create($request->all());

    	return redirect(route('provider.show'));
    }

    public function show()
    {
        $providers = Provider::get([
            'id', 'name', 'rfc', 'city', 'phone', 'email', 'contact'
        ]);


        return view('providers.show', compact('providers'));
    }
}
