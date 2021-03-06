<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Runa\RItem;

class ItemController extends Controller
{
    function index()
    {
        $items = RItem::all();
        $processes = ['nissan', '3 toneladas', 'pick up', 'materia prima', 'varios'];
        return view('runa.items.index', compact('items', 'processes'));
    }

    function create()
    {
        return view('runa.items.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        RItem::create($request->all());

        return redirect(route('runa.item.index'));
    }

    function show($id)
    {
        //
    }

    function edit(RItem $ritem)
    {
        return view('runa.items.edit', compact('ritem'));
    }

    function update(Request $request)
    {
        $item = RItem::find($request->id);

        $item->update($request->except(['id']));

        return redirect(route('runa.item.index'));
    }

    function stock(Request $request)
    {
        $item = RItem::find($request->id);
        if ($request->action == 'plus') {
            $item->update(['stock' => $item->stock + $request->stock]);
        } else {
            $item->update(['stock' => $item->stock - $request->stock]);
        }

        return back();
    }

    function destroy($id)
    {
        $item = RItem::destroy($id);

        return back();
    }
}
