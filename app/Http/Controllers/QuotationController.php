<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Client;
use App\Quotation;
use App\Expense;

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

        return view('quotations.products', compact('products', 'clients', 'lastQ', 'discounts'));
    }

    function make()
    {
        $clients = Client::pluck('name', 'id')->toArray();

        $lastQ = Quotation::all()->last();
        $lastQ = empty($lastQ) ? 0: $lastQ->id;

        return view('quotations.advance', compact('clients', 'lastQ'));
    }

    function store(Request $request)
    {
        $this->validate($request, ['client' => 'required','description' => 'required']);

        $client = Client::find($request->client);

        $quotation = Quotation::create([
            'type' => $request->type,
            'client' => $request->client,
            'status' => $client->credit ? 'credito': $request->status,
            'description' => $request->description,
            'amount' => $request->amount * (1 - $client->discount/100),
        ]);

        $amount = $request->amount;

        $products = [];

        for ($i=0; $i < count($request->quantity); $i++) {
            $product = [];
            if($request->quantity[$i] > 0) {
                $product['quantity'] =  $request->quantity[$i];
                $product['material'] =  $request->material[$i];
                $product['total'] =  $request->total[$i];
                array_push($products, $product);
            }
        }

        $quotation->products = serialize($products);

        $quotation->save();
        $date = Date::now()->format('d-m-Y');

        return view('quotations.ticket', compact('quotation', 'date', 'amount'));
    }

    function save(Request $request)
    {
        $this->validate($request, [
            'client' => 'required',
            'description' => 'required',
            'deliver' => 'required'
            ]);

        $quotation = Quotation::create($request->all());

        $date = Date::now()->format('d-m-Y');

        if ($quotation->clientr->credit) {
            $quotation->status = 'autorizado';
            $quotation->amount = 0;
            $quotation->date_payment = $date;
            $quotation->save();

            return redirect(route('production.engineers'));;
        }

        return view('quotations.ticket', compact('quotation', 'date'));
    }

    function showAll()
    {
        $quotations = Quotation::where('status', '!=', 'cancelado')->get();

        return view('quotations.show', compact('quotations'));
    }

    function cancel($id)
    {
        $q = Quotation::find($id);
        $q->status = 'cancelado';
        $q->save();

        return back();
    }

    function details($id)
    {
        $quotation = Quotation::find($id);
        return view('quotations.details', compact('quotation'));
    }
}
