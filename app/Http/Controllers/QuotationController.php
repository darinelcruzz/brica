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

        return view('quotations.products', compact('products', 'clients', 'lastQ'));
    }

    function make()
    {
        $clients = Client::pluck('name', 'id')->toArray();

        $lastQ = Quotation::all()->last();
        $lastQ = empty($lastQ) ? 0: $lastQ->id;

        return view('quotations.advance', compact('clients', 'lastQ'));
    }

    function build($id)
    {
        $quotation = Quotation::find($id);
        return view('quotations.production', compact('quotation'));
    }

    function store(Request $request)
    {
        $this->validate($request, ['client' => 'required','description' => 'required']);

        $quotation = Quotation::create([
            'type' => $request->type,
            'client' => $request->client,
            'status' => $request->status,
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

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

        return view('quotations.ticket', compact('quotation', 'date'));
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

            return view('quotations.ticket', compact('quotation', 'date'));
    }

    function whatch()
    {
        $finish = Quotation::where('type', 'produccion')->where('status', 'finalizado')->get();

        return view('quotations.whatch', compact('finish'));
    }

    public function pay(Request $request)
    {
        $folio = Quotation::find($request->id);
        if($folio->type == 'terminado') {
            $folio->status = 'pagado';
        } else {
            $folio->status = 'autorizado';
        }

        $folio->date_payment = Date::now()->format('Y-m-d');
        $folio->save();

        return redirect(route('quotation.show'));
    }

    function cash(Request $request)
    {
        $date = $request->date;
        $date = $date == 0 ? Date::now() : $date;

        $paid = Quotation::where('date_payment',$date)->where('status', '!=', 'pendiente')->get();

        $totalP = Quotation::totalPaid($date);
        $totalP = $paid->isEmpty() ? '0': $totalP;

        $expenses = Expense::where('date',$date)->select('description', 'amount')->get();

        $totalE = Expense::totalExpenses($date);
        $totalE = $expenses->isEmpty() ? '0': $totalE;

        $total = $totalP-$totalE;
        return view('quotations.cash', compact('paid', 'totalP', 'expenses', 'totalE', 'date', 'total'));
    }

    function details($id)
    {
        $quotation = Quotation::find($id);
        return view('quotations.details', compact('quotation'));
    }
}
