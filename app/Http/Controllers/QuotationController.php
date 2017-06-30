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
            'id', 'client', 'amount']);

        $production = Quotation::where('status', 'produccion');

        $paid = Quotation::where('status', 'pagado')->get([
            'id', 'client', 'type', 'amount']);

        return view('quotations.show', compact('terminated', 'production', 'paid'));
    }

    public function pay(Request $request)
    {
        $folio = Quotation::find($request->id);
        $folio->status = 'pagado';
        $folio->date_payment = Date::now()->format('Y-m-d');
        $folio->save();

        return redirect(route('quotation.show'));
    }

    function cash(Request $request)
    {
        $date = $request->date;
        $date = $date == 0 ? Date::now() : $date;

        $paid = Quotation::where('date_payment',$date)->where('status', 'pagado')->get([
            'id', 'client', 'type', 'amount']);

        $totalP = Quotation::totalPaid($date);
        $totalP = $paid->isEmpty() ? '0': $totalP;

        $expenses = Expense::where('date',$date)->select('description', 'amount')->get();

        $totalE = Expense::totalExpenses($date);
        $totalE = $expenses->isEmpty() ? '0': $totalE;

        $total = $totalP-$totalE;
        return view('quotations.cash', compact('paid', 'totalP', 'expenses', 'totalE', 'date', 'total'));
    }
}
