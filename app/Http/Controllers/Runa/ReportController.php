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
        $startDate = $request->startDate == 0 ? Date::now() : $request->startDate;
        $endDate = $request->endDate == 0 ? Date::now() : $request->endDate;

        $chart = Charts::create('bar', 'highcharts')
                ->title('Rendimiento')
                ->colors(['#3c8dbc', '#00a65a', '#D81B60', '#f39c12'])
                ->labels(['Runa1', 'Runa2', 'Runa3', 'Runa4'])
                ->elementLabel('Total generado ($)')
                ->values($this->getSums($startDate, $endDate))
                ->dimensions(0,500);

        return view('runa.report', compact('chart', 'startDate', 'endDate', 'r'));
    }

    function getSums($start, $end)
    {
        $sums = [];

        for ($i=1; $i < 5; $i++) {
            $r = Quotation::teamReport("R$i", $start, $end);
            $sums[$i - 1] = empty($r) ? 0: $r;
        }

        return $sums;
    }
}
