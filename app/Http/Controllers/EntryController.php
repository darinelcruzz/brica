<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class EntryController extends Controller
{
    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'quotation' => 'required',
    		'date' => 'required',
    		'provider' => 'required',
    		'amount' => 'required',
    		'items' => 'required',
            //'quantity' => 'required',
            'caliber' => 'required',
    	]);

    	$entry = Entry::create($request->all());

    	return redirect(route('entries.show'));
    }

    public function show()
    {
        $entries = Entry::all();

        return view('entries.show', compact('entries'));
    }
}
