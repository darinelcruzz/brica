<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Hercules\HItem;
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
    	Excel::load('inventario.xlsx', function($reader) {
            foreach ($reader->get() as $item) {
                HItem::create([
                  'description' => $item->description,
                  'family' => $item->family,
                  'caliber' => $item->caliber,
                  'unity' => $item->unity,
                  'weight' => $item->weight,
                  'price' => $item->price,
                  'type' => $item->type,
                  'stock' => $item->stock,
                  'code' => $item->code,
                ]);
            }
        });

        return redirect('hercules/articulos/inventarios');
    }
}
