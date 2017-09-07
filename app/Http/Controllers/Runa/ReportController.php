<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use App\Quotation;
use App\Sale;
use App\Client;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    function teams(Request $request)
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

        return view('runa.reports.teams', compact('money', 'works', 'startDate', 'endDate'));
    }

    function sales(Request $request)
    {
      $startDate = $request->startDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d H:i:s', $request->startDate . " 00:00:00");
      $endDate = $request->endDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d H:i:s', $request->endDate . " 23:59:59");

      $data = $this->getSalesTotals($startDate, $endDate);
      $salesChart = Charts::create('bar', 'highcharts')
                        ->elementLabel("Total")
                        ->title('Ventas')
                        ->values($data[0])
                        ->labels($data[1])
                        ->colors(['#3c8dbc'])
                        ->dimensions(1000, 500);

      return view('runa.reports.sales', compact('salesChart', 'startDate', 'endDate'));
    }

    function clients(Request $request)
    {
        $startDate = $request->startDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d H:i:s', $request->startDate . " 00:00:00");
        $endDate = $request->endDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d H:i:s', $request->endDate . " 23:59:59");

        $clients = Client::all();

        $values = [];
        $labels = [];

        foreach ($clients as $client) {
            if ($client->name != "HERCULES" && $client->name != "PUBLICO GENERAL") {
                if ($client->getMoney($startDate, $endDate) > 0) {
                    array_push($values, $client->getMoney($startDate, $endDate));
                    array_push($labels, $client->uppercase_name);
                }
            }
        }

        $clientsChart = Charts::create('bar', 'highcharts')
                          ->elementLabel("Total ($)")
                          ->title('Reporte $ clientes')
                          ->values($values)
                          ->labels($labels)
                          ->colors(['#3c8dbc', '#f56954'])
                          ->dimensions(1000, 750);

        return view('runa.reports.clients', compact('clientsChart', 'startDate', 'endDate'));
    }

    function products(Request $request)
    {
        $startDate = $request->startDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d H:i:s', $request->startDate . " 00:00:00");
        $endDate = $request->endDate == 0 ? Date::now() : Date::createFromFormat('Y-m-d H:i:s', $request->endDate . " 23:59:59");

        return view('runa.reports.products', compact('startDate', 'endDate'));
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
}
