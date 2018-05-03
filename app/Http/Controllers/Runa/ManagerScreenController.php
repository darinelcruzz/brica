<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\{Quotation, User};

class ManagerScreenController extends Controller
{
    function index()
    {
        $teams = User::where('level', '5')->get();

        return view('runa.production.manager', compact('teams'));
    }

    function assign(Request $request)
    {
        $this->validate($request, ['team' => 'required']);

        $quotation = Quotation::find($request->id);
        $quotation->update([
            'status' => 'asignado',
            'team' => $request->team,
            'startTime' => Carbon::now()->format('h:i:s a')
        ]);

        return back();
    }

    function weight()
    {
        return view('runa.production.weights');
    }

    function productivity()
    {
        return view('runa.production.productivity');
    }

    function addWeight(Request $request)
    {
        $quotation = Quotation::find($request->id);
        $quotation->update([
            'weight' => $request->weight
        ]);

        return redirect(route('runa.manager.weight'));
    }

    function foliost()
    {
        $quotations = Quotation::where('type', 'terminado')->get();

        foreach ($quotations as $quotation) {
            $folio = $quotation->id;
            $quotation->update([
                'folio' => $folio
            ]);
        }

        return 'ok';
    }

    function foliosp()
    {
        $quotations = Quotation::where('type', 'produccion')->get();

        foreach ($quotations as $quotation) {
            $folio = $quotation->id;
            $quotation->update([
                'folio' => $folio
            ]);
        }

        return 'ok';
    }
}
