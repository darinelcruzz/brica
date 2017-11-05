<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Runa\RCut;

class CutController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required',
            'length' => 'required',
            'width' => 'required',
            'caliber' => 'required'
        ]);

        $cut = RCut::create($request->all());

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit(RCut $rcut, $status)
    {
        $rcut->update(['status' => $status]);

        return back();
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
