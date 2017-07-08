<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\Sale;
use Jenssegers\Date\Date;

class CashierScreenController extends Controller
{
    function index()
    {
        $terminated = Quotation::terminated('pendiente');
        $production = Quotation::production('pendiente');
        $paid = Quotation::where('status', '!=', 'pendiente')->get();

        return view('quotations.cashier', compact('terminated', 'production', 'paid'));
    }

    function pay($id)
    {
        $quotation = Quotation::find($id);
        if($quotation->type == 'terminado') {
            $quotation->status = 'pagado';
            $quotation->date_payment = Date::now()->format('Y-m-d');
            $quotation->save();
            return $this->saveAsSale($quotation);
        }

        $quotation->status = 'autorizado';
        $quotation->date_payment = Date::now()->format('Y-m-d');
        $quotation->save();

        return back();
    }

    function showFinished()
    {
        $quotations = Quotation::production('finalizado');

        return view('quotations.finished', compact('quotations'));
    }

    function calculate($id = null)
    {
        $quotation = Quotation::find($id);
        return view('quotations.calculate', compact('quotation'));
    }

    function saveAsSale($quotation)
    {
        Sale::create([
            'quotation' => $quotation->id,
            'retainer' => $quotation->amount,
            'amount' => $quotation->amount
        ]);

        return redirect(route('quotation.show'));
    }
}
