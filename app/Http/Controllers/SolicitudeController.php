solicitudes<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitude;

class SolicitudeController extends Controller
{
   public function create()
	{
		$lastId = Solicitude::all()->last()->id;

		return view('solicitudes.create', compact('lastId'));
	}

     public function show()
    {
        $solicitudes = Solicitude::get([
            'id', 'client', 'description', 'team', 'total'
        ]);


        return view('solicitudes.show', compact('solicitudes'));
    }

	public function store(Request $request)
    {
    	$this->validate($request, [
            'client' => 'required',
            'description' => 'required',
            'team' => 'required',
            'quantity1' => 'required', 
            'material1' => 'required',
    	]);

    	$solicitude = Solicitude::create($request->all());

    	return redirect(route('solicitude.show'));
    }

}
