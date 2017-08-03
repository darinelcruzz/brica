<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HItem;

class ItemController extends Controller
{
    public function index()
    {
        $items = HItem::all();
        return view('hercules.items.index', compact('items'));
    }

    public function create()
    {
        return view('hercules.items.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'caliber' => 'required',
            'unity' => 'required',
            'weight' => 'required',
            'price' => 'required',
        ]);

        HItem::create($request->all());

        return redirect(route('hercules.items'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
