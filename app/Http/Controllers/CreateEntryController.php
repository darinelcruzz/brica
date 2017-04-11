<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class CreateEntryController extends Controller
{
    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'quotation' => 'required',
    		'weight' => 'required',
    		'date' => 'required',
    		'provider' => 'required',
    		'amount' => 'required',
    		'items' => 'required',
    	]);

    	$entry = Entry::create($request->all());

    	return redirect(route('entries.create'));
    }
}
