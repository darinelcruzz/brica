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
        $bodyworks = HBodywork::where('price', 1)->where('type', 'redila')->get();
        return view('hercules.bodyworks.index', compact('bodyworks'));
    }

    function trailers()
    {
        $bodyworks = HBodywork::where('price', 1)->where('type', 'remolque')->get();
        return view('hercules.bodyworks.trailers', compact('bodyworks'));
    }

    function dry()
    {
        $bodyworks = HBodywork::where('price', 1)->where('type', 'seca')->get();
        return view('hercules.bodyworks.dry', compact('bodyworks'));
    }

    function soda()
    {
        $bodyworks = HBodywork::where('price', 1)->where('type', 'refresco')->get();
        return view('hercules.bodyworks.soda', compact('bodyworks'));
    }

    function platform()
    {
        $bodyworks = HBodywork::where('price', 1)->where('type', 'plataforma')->get();
        return view('hercules.bodyworks.platform', compact('bodyworks'));
    }

    function carboys()
    {
        $bodyworks = HBodywork::where('price', 1)->where('type', 'garrafonera')->get();
        return view('hercules.bodyworks.carboys', compact('bodyworks'));
    }

    function boxes()
    {
        $bodyworks = HBodywork::where('price', 1)->where('type', 'cajas')->get();
        return view('hercules.bodyworks.boxes', compact('bodyworks'));
    }

    function create($type)
    {
        return view('hercules.bodyworks.create', compact('type'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'family' => 'required',
            'height' => 'required',
            'width' => 'required',
            'length' => 'required',
        ]);

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
          'type' => $request->type,
      ]);

      return view('hercules.bodyworks.quantities', compact('bodywork'));
    }

    function addQuantities(Request $request)
    {
        $bodywork = HBodywork::find($request->id);

        $bodywork->update([
            'welding' => serialize($this->buildProcess(unserialize($bodywork->welding), $request->welding)),
            'anchoring' => serialize($this->buildProcess(unserialize($bodywork->anchoring), $request->anchoring)),
            'clothing' => serialize($this->buildProcess(unserialize($bodywork->clothing), $request->clothing)),
            'painting' => serialize($this->buildProcess(unserialize($bodywork->painting), $request->painting)),
            'mounting' => serialize($this->buildProcess(unserialize($bodywork->mounting), $request->mounting)),
        ]);

        return redirect('hercules/carrocerias/' . $bodywork->type . 's');
    }

    function show(HBodywork $hbodywork)
    {
        return view('hercules.bodyworks.show', compact('hbodywork'));
    }

    function edit(HBodywork $hbodywork)
    {
        return view('hercules.bodyworks.edit', compact('hbodywork'));
    }

    function update(Request $request)
    {
        $bodywork = HBodywork::find($request->id);

        $formerData = $this->getOldProcesses($bodywork);

        $bodywork->update([
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

        return view('hercules.bodyworks.quantities', compact('bodywork', 'formerData'));
    }

    function clone(HBodywork $hbodywork)
    {
        return view('hercules.bodyworks.clone', compact('hbodywork'));
    }

    function duplicate(Request $request)
    {
        $bodywork = HBodywork::find($request->id);

        $formerData = $this->getOldProcesses($bodywork);

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
            'type' => $request->type,
        ]);

        return view('hercules.bodyworks.quantities', compact('bodywork', 'formerData'));
    }

    function buildProcess($ids, $quantities)
    {
        $process = [];

        for ($i = 0; $i < count($ids); $i++) {
            $process[$ids[$i]] = $quantities[$i];
        }

        return $process;
    }

    function getOldProcesses($bodywork)
    {
        $processes = [
            'welding' => unserialize($bodywork->welding),
            'anchoring' => unserialize($bodywork->anchoring),
            'clothing' => unserialize($bodywork->clothing),
            'painting' => unserialize($bodywork->painting),
            'mounting' => unserialize($bodywork->mounting)
        ];

        return $processes;
    }

    function disable(HBodywork $hbodywork)
    {
        $hbodywork->update([
            'price' => 0,
        ]);

        return back();
    }
}
