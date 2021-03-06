<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\{Quotation, Sale, Client, Product};
use App\Models\Runa\RCut;
use Charts;

class ReportController extends Controller
{
    function teams(Request $request)
    {
        $dates = $this->getFormattedDates($request);
        // dd($dates);
        $dataForCharts = $this->dataForTeams($dates['start'], $dates['end']);
        $dataForWeightsChart = $this->weightsByTeams($dates['start'], $dates['end']);

        $money = $this->createChart(
            'Dinero', ['Runa1', 'Runa2', 'Runa3', 'Runa4'],
            $dataForCharts[0]
        );

        $works = $this->createChart(
            'Trabajos', ['Runa1', 'Runa2', 'Runa3', 'Runa4'],
            $dataForCharts[1], 'Trabajos hechos'
        );

        $weights = $this->createChart(
            'Peso', ['Runa1', 'Runa2', 'Runa3', 'Runa4', 'RunaC'],
            $dataForWeightsChart, 'Kilogramos'
        );

        return view('runa.reports.teams', compact('money', 'works', 'dates', 'weights'));
    }

    function sales(Request $request)
    {
        $dates = $this->getFormattedDates($request);

        if ($request->mode == 'm') {
            $dataForCharts = $this->getSalesTotals($dates['start'], $dates['end'], 'M-Y');
        } else {
            $dataForCharts = $this->getSalesTotals($dates['start'], $dates['end']);
        }

        $salesChart = $this->createChart('Ventas', $dataForCharts[1], $dataForCharts[0]);

        return view('runa.reports.sales', compact('salesChart', 'dates'));
    }

    function clients(Request $request)
    {
        $dates = $this->getFormattedDates($request);

        $clients = Client::where([
            ['name', '!=', 'HERCULES'],
            ['name', '!=', 'PUBLICO GENERAL'],
        ])->get();

        $labels = $clients->filter(function ($client) use ($dates) {
            return $client->getMoney($dates['start'], $dates['end']) > 0;
        })->transform(function ($client) {
            return $client->uppercase_name;
        })->toArray();

        $values = [];

        foreach ($clients as $client) {
            if ($client->getMoney($dates['start'], $dates['end']) > 0) {
                array_push($values, $client->getMoney($dates['start'], $dates['end']));
            }
        }

        $clientsChart = $this->createChart('Clientes', $labels, $values, 'Total compras ($)');

        return view('runa.reports.clients', compact('clientsChart', 'dates'));
    }

    function products(Request $request)
    {
        $dates = $this->getFormattedDates($request);

        $quotations = Quotation::whereBetween('payment_date', [$dates['start'], $dates['end']])
            ->where('status', '!=', 'pendiente')
            ->where('status', '!=', 'cancelado')
            ->where('status', '!=', 'credito')
            ->get();

        $items = Product::all();

        $data = [];

        foreach ($items as $item) {
            $totalP = 0;
            $totalU = 0;

            foreach ($quotations as $quotation) {
                $products = unserialize($quotation->products);

                if ($products) {
                    foreach ($products as $product) {
                        $totalP += $item->id == $product['material'] ? $product['total'] : 0;
                        $totalU += $item->id == $product['material'] ? $product['quantity'] : 0;
                    }
                }
            }

            if ($totalP) {
                $data[$item->getLabel($totalU)] = $totalP;
            }
        }

        $chart = $this->createChart('Productos', array_keys($data), array_values($data), 'Total vendido ($)');

        return view('runa.reports.products', compact('dates', 'chart'));
    }

    function dataForTeams($startDate, $endDate)
    {
        $sums = $quantities = [];

        for ($i=1; $i < 5; $i++) {
            $r = 0;

            $quotations = Quotation::madeByTeam("R$i", $startDate, $endDate)->get();

            // dd($quotations);

            foreach ($quotations as $quotation) {
                $r += $quotation->balance;
            }

            array_push($sums, $r);
            array_push($quantities, count($quotations));
        }

        return [$sums, $quantities];
    }

    function weightsByTeams($startDate, $endDate)
    {
        $sums = [];

        $teams = ['R1','R2','R3','R4','RC'];

        foreach($teams as $team) {
            $quotations = Quotation::where('team', $team)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->where('status', '!=', 'cancelado');

            array_push($sums, $quotations->sum('weight'));
        }

        $cutsSum = RCut::whereBetween('updated_at', [$startDate, $endDate])
                    ->where('weight', '>', 0)
                    ->where('order_id', 0)
                    ->sum('weight');

        $sums[4] += $cutsSum;

        return $sums;
    }

    function getSalesTotals($from, $to, $format = 'd-M')
    {
        $sums = $labels = [];

        $dates = $format == 'd-M' ? Sale::fromDateToDate($from, $to): Sale::fromMonthToMonth($from, $to);

        foreach ($dates as $date => $sales) {
            $sum = 0;
            array_push($labels, date($format, strtotime($date)));

            foreach ($sales as $sale) {
                if ($sale->quotationr->type != 'terminado' && $sale->quotationr->status != 'credito') {
                    $sum += $sale->amount - $sale->retainer;
                }
            }

            $quotations = $format == 'd-M' ? Quotation::inBalance($date, false): Quotation::monthBalance($date, false);

            foreach ($quotations as $quotation) {
                if ($quotation->amount) {
                    $sum += $quotation->amount;
                }
            }

            array_push($sums, $sum);
        }

        return [$sums, $labels];
    }

    function getFormattedDates(Request $request)
    {
        if ($request->startDate) {
            if ($request->mode && $request->mode != 'n') {
                return [
                    'start' => $request->startDate . "-01 00:00:00", 
                    'end' => $request->endDate . "-31 23:59:59"
                ];
            }
            return [
                'start' => $request->startDate . " 00:00:00", 
                'end' => $request->endDate . " 23:59:59"
            ];
        }

        return ['start' => date('Y-m-d'), 'end' => date('Y-m-d')];
    }

    function createChart($title, $labels, $values, $element = 'Total generado ($)')
    {
        return Charts::create('bar', 'highcharts')
                ->title($title)
                ->colors(['#F39C12', '#f9f393'])
                ->labels($labels)
                ->elementLabel($element)
                ->values($values)
                ->dimensions(0,500);
    }
}
