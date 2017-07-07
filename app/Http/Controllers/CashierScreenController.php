<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
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
        $folio = Quotation::find($id);
        if($folio->type == 'terminado') {
            $folio->status = 'pagado';
        } else {
            $folio->status = 'autorizado';
        }

        $folio->date_payment = Date::now()->format('Y-m-d');
        $folio->save();

        return back();
    }
}
