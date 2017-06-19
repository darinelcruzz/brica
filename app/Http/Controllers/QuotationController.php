<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    function create()
    {
        $products = DB::table('products')
            ->pluck('name', 'id')
            ->toArray();
            
        return view('quotations.create', compact('products'));
    }

    function store(Request $request)
    {
        Quotation::create($request->all());

        return redirect(route('quotation.show'));
    }

    function show()
    {
        return view('quotations.show');
    }
}
