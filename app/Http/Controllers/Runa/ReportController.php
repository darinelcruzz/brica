<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use App\Quotation;
use Jenssegers\Date\Date;

class ReportController extends Controller
{
    function report(Request $request)
    {
        $startDate = $request->startDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d', $request->startDate);
        $endDate = $request->endDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d', $request->endDate);

        $quotations = $this->getTotals($startDate, $endDate);

        $chart = Charts::create('bar', 'highcharts')
                ->title('Rendimiento')
                ->colors(['#3c8dbc', '#00a65a', '#D81B60', '#f39c12'])
                ->labels(['Runa1', 'Runa2', 'Runa3', 'Runa4'])
                ->elementLabel('Total generado ($)')
                ->values($this->getTotals($startDate, $endDate))
                ->dimensions(0,500);

        return view('runa.report', compact('chart', 'startDate', 'endDate', 'quotations'));
    }

    function getTotals($startDate, $endDate)
    {
        $sums = [];

        for ($i=1; $i < 5; $i++) {
            $r = 0;

            $quotations = Quotation::whereBetween('payment_date', [$startDate, $endDate])
                ->where('status', '!=', 'pendiente')
                ->where('status', '!=', 'cancelado')
    			->where('status', '!=', 'credito')
    			->where('team', "R$i")
                ->get();

            foreach ($quotations as $quotation) {
                $r += $quotation->sale ? $quotation->sale->amount: $quotation->amount;
            }

            array_push($sums, $r);
        }

        return $sums;
    }
}
