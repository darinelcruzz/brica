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
        $monthly = isset($request->mode) ? $request->mode: false;
        // $dates = $this->getFormattedDates($request);
        // $sales = HStockSale::fromDateToDate($dates['start'], $dates['end'], true);
        $sales = $this->getStockSales($dates, $monthly);
        $unpaidR = HReceipt::retainersFromDateToDate($dates['start'], $dates['end'])->toArray();
        $paidR = HReceipt::amountsFromDateToDate($dates['start'], $dates['end'])->toArray();
        $deposits = HDeposit::fromDateToDate($dates['start'], $dates['end'])->toArray();

        $mergeR = array_merge_recursive($unpaidR, $paidR, $deposits);
        $receipts = [];
        foreach ($mergeR as $key => $value) {
          if(is_array($value)) {
              $receipts[$key] = array_sum($value);
          } else {
              $receipts[$key] = $value;
          }
        }

      ksort($receipts);

      $stockSalesChart = $this->createChart('Producto terminado', $sales[1], $sales[0]);
      $receiptsChart = $this->createChart('Carrocerías', array_keys($receipts), array_values($receipts));

      return view('hercules.reports.sales', compact('dates', 'stockSalesChart', 'receiptsChart'));
    }

    function getStockSales($dates, $monthly)
    {
        $sales = HStockSale::fromDateToDate($dates['start'], $dates['end'], $monthly);
        $sums = [];

        foreach ($sales as $daysOrMonths) {
            array_push($sums, $daysOrMonths->sum('amount'));
        }

        return [$sums, $sales->keys()];
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
