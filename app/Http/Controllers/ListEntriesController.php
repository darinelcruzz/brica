<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class ListEntriesController extends Controller
{
    public function show()
    {
    	$entries = Entry::all();

    	return view('entries.show', compact('entries'));
    }
}
