<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HOrder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PhotoUploadController extends Controller
{
    function create($id)
    {
        $order = HOrder::find($id);
        return view('hercules.production.photo', compact('order'));
    }

    function upload(Request $request)
    {
        $order = HOrder::find($request->order);

        $file = $request->file;
        $name = 'ORDEN' . $request->order;
        $ext = $file->extension();

        if($order->photo) {
            Storage::delete("public/hercules/$name.$ext");
        }

        $file->storeAs("public/hercules", "$name.$ext");

        $order->update([
            'photo' => Storage::url("hercules/$name.$ext")
        ]);

        return redirect(route('hercules.production'));
    }

    function destroy($img)
    {
        Storage::delete("public/hercules/$img");

        return back();
    }
}
