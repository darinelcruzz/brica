<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quotation;
use App\User;
use Carbon\Carbon;

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
}
