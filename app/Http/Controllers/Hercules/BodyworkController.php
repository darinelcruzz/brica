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
      $bodywork = HBodywork::create([
          'description' => $request->description,
          'family' => $request->family,
          'height' => $request->height,
          'width' => $request->width,
          'length' => $request->length,
          'welding' => serialize($request->welding),
          'anchoring' => serialize($request->anchoring),
          'clothing' => serialize($request->clothing),
          'painting' => serialize($request->painting),
          'mounting' => serialize($request->mounting),
      ]);

      return redirect(route('hercules.bodyworks'));
    }
}
