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

        $item = HItem::create([
          'description' => $request->description,
          'caliber' => $request->caliber,
          'unity' => $request->unity,
          'weight' => $request->weight,
          'price' => $request->price,
          'family' => ''
        ]);

        $item->addProcesses($request->processes);

        return redirect(route('hercules.items'));
    }

    public function show(HItem $hitem)
    {
        //
    }

    public function edit(HItem $hitem)
    {
        return view('hercules.items.edit', compact('hitem'));
    }

    public function update(Request $request)
    {
      $item = HItem::find($request->id);

      $item->update([
        'description' => $request->description,
        'caliber' => $request->caliber,
        'unity' => $request->unity,
        'weight' => $request->weight,
        'price' => $request->price,
        'family' => serialize($request->processes)
      ]);

      return redirect(route('hercules.items'));
    }

    public function destroy($id)
    {
        //
    }
}
