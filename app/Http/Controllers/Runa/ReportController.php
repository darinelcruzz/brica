<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use App\Quotation;
use App\Sale;
use App\Client;
use App\Product;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    function teams(Request $request)
    {
        $dates = $this->getFormattedDates($request);
        $dataForCharts = $this->dataForTeams($dates['start'], $dates['end']);

        $money = $this->createChart(
            'Dinero', ['Runa1', 'Runa2', 'Runa3', 'Runa4'],
            $dataForCharts[0]
        );

        $works = $this->createChart(
            'Trabajos', ['Runa1', 'Runa2', 'Runa3', 'Runa4'],
            $dataForCharts[1], 'Trabajos hechos'
        );

        return view('runa.reports.teams', compact('money', 'works', 'dates'));
    }

    function sales(Request $request)
    {
      $dates = $this->getFormattedDates($request);
      $dataForCharts = $this->getSalesTotals($dates['start'], $dates['end']);
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

            $quotations = Quotation::madeByTeam("R$i", $startDate, $endDate);

            foreach ($quotations as $quotation) {
                $r += $quotation->balance;
            }

            array_push($sums, $r);
            array_push($quantities, count($quotations));
        }

        return [$sums, $quantities];
    }

    function getSalesTotals($startDate, $endDate)
    {
        $sums = $labels = [];

        $quotations = Quotation::reportSales($startDate, $endDate);
        $startDay = substr($startDate, 0, 10);
        $sum = $i = 0;

        foreach ($quotations as $q) {

            if ($i > 0 && substr($q->payment_date, 0, 10) != $startDay)
            {
                array_push($sums, $sum);
                $sum = 0;
                $dateLabel = Date::createFromFormat('Y-m-d', $startDay);
                array_push($labels, $dateLabel->format('d-M'));
                $startDay = substr($q->payment_date, 0, 10);
            }

            $sum += $q->sale ? $q->sale->amount: $q->amount;
            $i += 1;
        }

        return [$sums, $labels];
    }

    function getFormattedDates(Request $request)
    {
        if ($request->startDate == 0) {
            $start = Date::now()->format('Y-m-d');
            $end = Date::now()->format('Y-m-d');
        } else {
            $start = Date::createFromFormat('Y-m-d H:i:s', $request->startDate . " 00:00:00");
            $end = Date::createFromFormat('Y-m-d H:i:s', $request->endDate . " 23:59:59");
        }
        return ['start' => $start, 'end' => $end];
    }

    function createChart($title, $labels, $values, $element = 'Total generado ($)')
    {
        return Charts::create('bar', 'highcharts')
                ->title($title)
                ->colors(['#3c8dbc', '#00a65a', '#D81B60', '#f39c12'])
                ->labels($labels)
                ->elementLabel($element)
                ->values($values)
                ->dimensions(0,500);
    }
}
