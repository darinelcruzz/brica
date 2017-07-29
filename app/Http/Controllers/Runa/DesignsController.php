<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class DesignsController extends Controller
{
    function index($type = 'designs')
    {
        $designs = Storage::files('public/designs');
        $temps = Storage::files('public/temp');
        return view('runa.designs', compact('type', 'designs', 'temps'));
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

    function destroy($img)
    {
        Storage::delete("public/temp/$img");

        return back();
    }
}
