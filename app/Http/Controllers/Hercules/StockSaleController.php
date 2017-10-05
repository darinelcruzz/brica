<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HClient;

class StockSaleController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $clients = HClient::pluck('name', 'id')->toArray();
        return view('hercules.stocksales.create', compact('clients'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
