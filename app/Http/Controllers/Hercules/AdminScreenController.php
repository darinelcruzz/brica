<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use App\Models\Hercules\HStockSale;
use App\Models\Hercules\HReceipt;

class AdminScreenController extends Controller
{
    function index(Request $request)
    {
        $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;

        $stocksales = HStockSale::all();
        $receipts = HReceipt::all();

        return view('hercules.balance', compact('stocksales', 'receipts', 'date'));
    }

}
