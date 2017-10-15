<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use Charts;
use App\Models\Hercules\HStockSale;
use App\Models\Hercules\HReceipt;

class ReportsController extends Controller
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
            $dataForCharts[1], 'Total trabajado'
        );

        return view('runa.reports.teams', compact('money', 'works', 'dates'));
    }

    function sales(Request $request)
    {
      $dates = $this->getFormattedDates($request);
      $sales = HStockSale::fromDateToDate($dates['start'], $dates['end'])->toArray();
      $receipts = $this->dataFromReceipts($dates['start'], $dates['end']);

      $chart = $this->createChart('Producto terminado', array_keys($sales), array_values($sales));
      //$chart = $this->createChart('Ventas', $receipts[0], $receipts[1]);

      return view('hercules.reports.sales', compact('dates', 'chart'));
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
        $sums = [];
        $quantities = [];

        for ($i=1; $i < 5; $i++) {
            $r = 0;

            $quotations = Quotation::moneyByTeam("R$i", $startDate, $endDate);

            foreach ($quotations as $quotation) {
                $r += $quotation->sale ? $quotation->sale->amount: $quotation->amount;
            }

            array_push($quantities, count($quotations));
            array_push($sums, $r);
        }

        return [$sums, $quantities];
    }

    function dataFromReceipts($startDate, $endDate)
    {
        $sums = [];
        $labels = [];

        $receipts = HReceipt::fromDateToDate($startDate, $endDate);
        $sum = $i = 0;

        foreach ($receipts as $receipt) {
            if ($i == 0) {
                $startDay = $receipt->date;
            }
            if ($receipt->date == $startDay) {
                $sum += $receipt->status == 'pagado' ? $receipt->amount: $receipt->retainer;
            } else {
                array_push($sums, $sum);
                $dateLabel = Date::createFromFormat('Y-m-d', $receipt->date);
                array_push($labels, $dateLabel->format('d-M'));
                $sum = $receipt->status == 'pagado' ? $receipt->amount: $receipt->retainer;
                $startDay = $receipt->date;
            }
            $i++;
        }

        return [$sums, $labels];
    }

    function getFormattedDates(Request $request)
    {
        if ($request->startDate == 0) {
            $start = $end = Date::now()->format('Y-m-d');
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
