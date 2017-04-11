<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateEntryController extends Controller
{
    public function create()
    {
        return view('entries.create');
    }
}
