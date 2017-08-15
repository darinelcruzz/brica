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
        $date = $request->date == 0 ? Date::now() : $request->date;

        $r1 = Quotation::teamReport('R1');
        $r2 = Quotation::teamReport('R2');
        $r3 = Quotation::teamReport('R3');
        $r4 = Quotation::teamReport('R4');

        $chart = Charts::create('bar', 'highcharts')
                ->title('Rendimiento')
                ->colors(['#3c8dbc', '#00a65a', '#D81B60', '#f39c12'])
                ->labels(['Runa1', 'Runa2', 'Runa3', 'Runa4'])
                ->elementLabel('Total generado ($)')
                ->values([$r1, $r2, $r3, $r4])
                ->dimensions(0,500);

        return view('runa.report', compact('chart', 'seno'));
    }
}
