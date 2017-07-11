<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Quotation;
use App\Order;
use App\User;

class ManagerScreenController extends Controller
{
    function index()
    {
        $pending = Quotation::production('autorizado');

        $completed = Quotation::production('terminado');

        $authorized = Quotation::production('asignado');

        $production = Quotation::production('produccion');

        $terminated = Quotation::production('finalizado');

        $teams = User::where('level', '5')->get();

        return view('production.manager', compact('pending', 'completed',
            'authorized', 'production', 'terminated', 'teams'));
    }

    function assign(Request $request)
    {
        $this->validate($request, ['team' => 'required']);

        $quotation = Quotation::find($request->id);
        $quotation->status = 'asignado';
        $quotation->team = $request->team;
        $quotation->startTime = Carbon::now()->format('h:i:s a');
        $quotation->save();

        return back();
    }
}
