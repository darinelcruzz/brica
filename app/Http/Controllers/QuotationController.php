<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\Quotation;

class QuotationController extends Controller
{
    function create()
    {
        $products = DB::table('products')
            ->pluck('name', 'id')
            ->toArray();

        $clients = Client::pluck('name', 'id')->toArray();

        $lastQ = Quotation::all()->last();
        $lastQ = empty($lastQ) ? 0: $lastQ->id;

        return view('quotations.create', compact('products', 'clients', 'lastQ'));
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
