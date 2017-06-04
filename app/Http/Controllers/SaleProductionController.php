<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleProductionController extends Controller
{
    public function create()
	{
		return view('salesProduction.create');
	}

     /*public function show()
    {
        $saleProduction = SaleProduction::all();

        return view('saleProduction.show', compact('saleProduction'));
    }

	public function store(Request $request)
    {
    	$this->validate($request, [

    	]);

    	$solicitude = SaleProduction::create($request->all());

    	return redirect(route('saleProduction.show'));
    }*/
}
