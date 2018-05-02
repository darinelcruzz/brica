<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use App\Models\Hercules\{HStockSale, HReceipt, HDeposit};
use Charts;

class ReportsController extends Controller
{
    function sales(Request $request)
    {
        $dates = $this->getFormattedDates($request);
        $sales = $this->getStockSales($dates, $request->mode);
        $unpaidR = $this->getReceipts($dates, $request->mode, '!=', 'retainer');
        $paidR = $this->getReceipts($dates, $request->mode, '=', 'amount');
        $deposits = $this->getDeposits($dates, $request->mode);
        $mergeR = array_merge_recursive($unpaidR, $paidR, $deposits);
        // dd($unpaidR, $sales, $paidR, $deposits, $mergeR);

        $receipts = [];
        foreach ($mergeR as $key => $value) {
          if(is_array($value)) {
              $receipts[$key] = array_sum($value);
          } else {
              $receipts[$key] = $value;
          }
        }

        // ksort($receipts);
        // dd($receipts);

        $stockSalesChart = $this->createChart('Producto terminado', $sales[1], $sales[0]);
        $receiptsChart = $this->createChart('Carrocerías', array_keys($receipts), array_values($receipts));

        return view('hercules.reports.sales', compact('dates', 'stockSalesChart', 'receiptsChart'));
    }

    function getStockSales($dates, $monthly)
    {
        $sales = HStockSale::fromDateToDate($dates['start'], $dates['end'], $monthly == 'm');
        $sums = [];

        foreach ($sales as $daysOrMonths) {
            array_push($sums, $daysOrMonths->sum('total'));
        }

        return [$sums, $sales->keys()];
    }

    function getDeposits($dates, $monthly)
    {
        $sales = HDeposit::fromDateToDate($dates['start'], $dates['end'], $monthly == 'm');
        $mapped = $sales->map(function ($item, $key) {
            return $item->sum('amount');
        });

        return $mapped->toArray();
    }

    function getReceipts($dates, $monthly, $op, $column)
    {
        $sales = HReceipt::receiptsFromDateToDate($dates['start'], $dates['end'], $monthly == 'm', $op);

        $mapped = $sales->map(function ($item, $key) use ($column) {
            return $item->sum($column);
        });

        return $mapped->toArray();
    }

    function getFormattedDates(Request $request)
    {
        if ($request->startDate) {
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
                ->colors(['#3c8dbc', '#96c7dd'])
                ->labels($labels)
                ->elementLabel($element)
                ->values($values)
                ->dimensions(0,500);
    }
}
