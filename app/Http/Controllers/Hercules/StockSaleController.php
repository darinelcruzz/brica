<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\{HClient, HStockSale};

class StockSaleController extends Controller
{
    public function index()
    {
        $stocksales = HStockSale::all();
        return view('hercules.stocksales.index', compact('stocksales'));
    }

    public function create()
    {
        $clients = HClient::pluck('name', 'id')->toArray();
        return view('hercules.stocksales.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['client' => 'required','other' => 'sometimes|required']);

        $sale = HStockSale::create($request->except(['quantity', 'item', 'subtotal']));

        $sale->storeProducts($request);

        return $this->index();
    }

    public function show(HStockSale $hstocksale)
    {
        return view('hercules.stocksales.show', compact('hstocksale'));
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

    function ticket(HStockSale $hstocksale)
    {
        return view('hercules.stocksales.ticket', compact('hstocksale'));
    }
}
