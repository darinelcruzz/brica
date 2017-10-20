<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HPersonnel;

class PersonnelController extends Controller
{
    function index()
    {
        $personnel = HPersonnel::where('active', 1)->get();
        return view('hercules.personnel.index', compact('personnel'));
    }

    function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required'
        ]);

        HPersonnel::create($request->all());

        return redirect(route('hercules.personnel.index'));
    }

    function edit(HPersonnel $hpersonnel)
    {
        return view('hercules.personnel.edit', compact('hpersonnel'));
    }

    function update(Request $request)
    {
        $personnel = HPersonnel::find($request->id);
        $personnel->update($request->except(['id']));

        return $this->index();
    }

    function destroy(HPersonnel $hpersonnel)
    {
        $hpersonnel->update(['active' => 0]);

        return $this->index();
    }

}
