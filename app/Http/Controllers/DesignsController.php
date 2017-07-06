<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class DesignsController extends Controller
{
    function show()
    {
        return Storage::files('public/designs');
    }

    function uploadForm($type = 'designs')
    {
        $designs = Storage::files('public/designs');
        $temps = Storage::files('public/temp');
        return view('files', compact('type', 'designs', 'temps'));
    }

    function upload(Request $request)
    {
        $this->validate($request, ['name' => 'required']);
        $file = $request->file;
        $name = $request->name;
        $ext = $file->extension();
        $type = $request->type;

        $file->storeAs("public/$type", "$name.$ext");

        return back();
    }

    function deleteImage($img)
    {
        Storage::delete("public/temp/$img");

        $order = Order::where('added', "/storage/temp/$img")->get();
        $order->added = '';
        $order->save();

        return back();
    }
}
