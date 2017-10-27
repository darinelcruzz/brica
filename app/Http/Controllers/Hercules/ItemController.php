<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HItem;

class ItemController extends Controller
{
    public function index()
    {
        $items = HItem::where('type', 'carroceria')->get();
        return view('hercules.items.index', compact('items'));
    }

    public function trailers()
    {
        $items = HItem::where('type', 'inventario')
                    ->where('family', 'remolques')
                    ->get();

        return view('hercules.items.trailers', compact('items'));
    }

    public function inventory()
    {
        $items = HItem::where('type', 'inventario')
                    ->where('family', '!=', 'remolques')
                    ->get();
        $processes = ['soldadura', 'fondeo y pintura', 'vestido', 'montaje', 'varios', 'epp', 'remolques'];

        return view('hercules.items.inventory', compact('items', 'processes'));
    }

    public function updateStock(Request $request)
    {
        $item = HItem::find($request->id);
        if ($request->action == 'plus') {
            $item->update(['stock' => $item->stock + $request->stock]);
        } else {
            $item->update(['stock' => $item->stock - $request->stock]);
        }

        return back();
    }

    public function create($type)
    {
        return view('hercules.items.create', compact('type'));
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
          'type' => $request->type,
          'code' => $request->code,
          'family' => ''
        ]);

        if($request->family) {
            $item->update(['family' => $request->family]);
        } else {
            $item->addProcesses($request->processes);
        }

        if ($request->type == 'inventario') {
            $url = $request->family == 'remolques' ? 'inventarios/remolques': 'inventarios';
        } else {
            $url = 'carrocerias';
        }

        return redirect('hercules/articulos/' . $url);
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
        'code' => $request->code,
        'family' => $item->type == 'carroceria' ? serialize($request->processes): $request->family,
      ]);

      return redirect('hercules/articulos/' . $item->type . 's');
    }

    function items()
    {
        $hitems = HItem::where('type', 'inventario')
                    ->where('family', 'remolques')
                    ->selectRaw('id, CONCAT(description, ", (", stock, " en existencia)") as description, unity, price')
                    ->get();
        $items = [];

        foreach ($hitems as $item) {
            $items[$item->id] = $item;
        }

        return $items;
    }

    public function destroy(HItem $hitem)
    {
        $hitem->update([
            'type' => 'eliminado'
        ]);

        return back();
    }
}
