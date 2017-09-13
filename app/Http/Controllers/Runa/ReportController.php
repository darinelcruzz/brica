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

        $money = $this->createChart(
            'Dinero', ['Runa1', 'Runa2', 'Runa3', 'Runa4'],
            $this->getTotals($dates['start'], $dates['end'])
        );

        $works = $this->createChart(
            'Trabajos', ['Runa1', 'Runa2', 'Runa3', 'Runa4'],
            $this->getWorks($dates['start'], $dates['end'])
        );

        return view('runa.reports.teams', compact('money', 'works', 'dates'));
    }

    function sales(Request $request)
    {
      $dates = $this->getFormattedDates($request);

      $data = $this->getSalesTotals($dates['start'], $dates['end']);

      $salesChart = $this->createChart('Ventas', $data[1], $data[0]);

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
            $total = 0;

            foreach ($quotations as $quotation) {
                $products = unserialize($quotation->products);

                if ($products) {
                    foreach ($products as $product) {
                        $total += $item->id == $product['material'] ? $product['quantity'] : 0;
                    }
                }
            }

            if ($total) {
                $data[$item->complete_name] = $total;
            }
        }

        $chart = $this->createChart('Productos', array_keys($data), array_values($data), 'Total vendido');

        return view('runa.reports.products', compact('dates', 'chart'));
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

    function getSalesTotals($startDate, $endDate)
    {
        $sums = [];
        $labels = [];

        $sales = Sale::whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $startDay = substr($startDate, 0, 10);
        $sum = 0;

        foreach ($sales as $sale) {
            if ($sale->quotationr->status != 'cancelado') {
                if ($sale->created_at->format('Y-m-d') == $startDay) {
                    $sum += $sale->amount;
                } else {
                    array_push($sums, $sum);
                    $dateLabel = Date::createFromFormat('Y-m-d H:i:s', $sale->created_at);
                    array_push($labels, $dateLabel->format('d-M'));
                    $sum = $sale->amount;
                    $startDay = $sale->created_at->format('Y-m-d');
                }
            }
        }

        return [$sums, $labels];
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

    function getFormattedDates(Request $request)
    {
        $start = $request->startDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d H:i:s', $request->startDate . " 00:00:00");
        $end = $request->endDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d H:i:s', $request->endDate . " 23:59:59");

        return [
            'start' => $start,
            'end' => $end
        ];
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
