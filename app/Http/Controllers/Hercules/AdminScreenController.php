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

        $stocksales = HStockSale::todayBalance($date);
        $receipts = HReceipt::todayBalance($date);

        $totalIncome = 0;

        return view('hercules.balance', compact('stocksales', 'receipts', 'date', 'totalIncome'));
    }

}
