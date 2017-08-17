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
        $startDate = $request->startDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d H:i:s', $request->startDate . " 00:00:00");
        $endDate = $request->endDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d H:i:s', $request->endDate . " 23:59:59");

        $quotations = $this->getTotals($startDate, $endDate);

        $money = Charts::create('bar', 'highcharts')
                ->title('Dinero')
                ->colors(['#3c8dbc', '#00a65a', '#D81B60', '#f39c12'])
                ->labels(['Runa1', 'Runa2', 'Runa3', 'Runa4'])
                ->elementLabel('Total generado ($)')
                ->values($this->getTotals($startDate, $endDate))
                ->dimensions(0,500);

        $works = Charts::create('bar', 'highcharts')
                ->title('Trabajos')
                ->colors(['#3c8dbc', '#00a65a', '#D81B60', '#f39c12'])
                ->labels(['Runa1', 'Runa2', 'Runa3', 'Runa4'])
                ->elementLabel('Total trabajado')
                ->values($this->getWorks($startDate, $endDate))
                ->dimensions(0,500);

        return view('runa.report', compact('money', 'works', 'startDate', 'endDate'));
    }

    function getTotals($startDate, $endDate)
    {
        $sums = [];

        for ($i=1; $i < 5; $i++) {
            $r = 0;

            $quotations = Quotation::whereBetween('payment_date', [$startDate, $endDate])
                ->where('status', '!=', 'pendiente')
                ->where('type', 'produccion')
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

    function getWorks($startDate, $endDate)
    {
        $quantities = [];

        for ($i=1; $i < 5; $i++) {
            $r = 0;

            $r = Quotation::whereBetween('payment_date', [$startDate, $endDate])
                ->where('status', '!=', 'pendiente')
                ->where('type', 'produccion')
                ->where('status', '!=', 'cancelado')
    			->where('status', '!=', 'credito')
    			->where('team', "R$i")
                ->count();

            array_push($quantities, $r);
        }

        return $quantities;
    }
}
