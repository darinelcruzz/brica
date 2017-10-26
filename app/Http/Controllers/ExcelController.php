<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Runa\RItem;
use App\Quotation;

class ExcelController extends Controller
{
    function export()
    {
        Excel::create('quotations', function ($excel)
        {
            $excel->sheet('cotizaciones', function ($sheet)
            {
                $items = Quotation::all();

                $sheet->fromArray($items);
            });
        })->export('xlsx');
    }

    function import()
    {
    	Excel::load('ritems.xlsx', function($reader) {
            foreach ($reader->get() as $item) {
                RItem::create([
                  'description' => $item->description,
                  'caliber' => $item->caliber,
                  'unity' => $item->unity,
                  'weight' => $item->weight,
                ]);
            }
        });

        return redirect('/runa');
    }
}
