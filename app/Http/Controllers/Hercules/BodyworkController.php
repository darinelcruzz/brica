<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HBodywork;

class BodyworkController extends Controller
{
    function index()
    {
        $bodyworks = HBodywork::all();
        return view('hercules.bodyworks.index', compact('bodyworks'));
    }
}
