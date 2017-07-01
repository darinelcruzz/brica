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
    		'provider' => 'required',
    		'amount' => 'required',
    		'items' => 'required',
            'caliber' => 'required',
    	]);

    	$entry = Entry::create($request->all());

    	return redirect(route('entries.show'));
    }

    public function show()
    {
        $entries = Entry::get([
            'id', 'quotation', 'provider', 'date', 'total_weight'
        ]);


        return view('entries.show', compact('entries'));
    }
}
