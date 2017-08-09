<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HBodywork;
use App\Models\Hercules\HItem;

class BodyworkController extends Controller
{
    function index()
    {
        $bodyworks = HBodywork::all();
        return view('hercules.bodyworks.index', compact('bodyworks'));
    }

    function create()
    {
      return view('hercules.bodyworks.create');
    }

    function store(Request $request)
    {
      $bodywork = HBodywork::create($request->all());

      $processes = ['soldadura', 'fondeo', 'vestido', 'pintura', 'montaje'];

      $index = 0;

      $items = $this->getItems('soldadura');

      return view('hercules.bodyworks.process', compact('items', 'index', 'processes'));
    }

    function getItems($process)
    {
        return HItem::all()->filter(function ($item) {
            return strpos($item->family, 'soldadura');
        })->pluck('description', 'id')->toArray();
    }
}
