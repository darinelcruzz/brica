<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HPersonnel;

class PersonnelController extends Controller
{
    function index()
    {
        $personnel = HPersonnel::all();
        return view('hercules.personnel', compact('personnel'));
    }

    function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required'
        ]);

        HPersonnel::create($request->all());

        return redirect(route('hercules.personnel'));
    }
}
