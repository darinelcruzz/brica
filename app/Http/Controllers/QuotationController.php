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
        $terminated = Quotation::where('type', 'terminado')->where('status', 'pendiente')->get([
            'id', 'client', 'amount', 'payment']);

        $production = Quotation::where('status', 'produccion');

        $paid = Quotation::where('status', 'pagado')->get([
            'id', 'client', 'amount','updated_at']);

        return view('quotations.show', compact('terminated', 'production', 'paid'));
    }

    public function pay(Request $request)
    {
        $this->validate($request, [
            'payment' => 'required',
        ]);

        $folio = Quotation::find($request->id);
        $folio->payment = $folio->payment + $request->payment;
        if($folio->payment >= $folio->amount)
        {
            $folio->status = 'pagado';
        }
        $folio->save();

        return redirect(route('quotation.show'));
    }
}
