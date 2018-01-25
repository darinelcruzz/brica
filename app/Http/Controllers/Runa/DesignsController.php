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

    function clean($timespan)
    {
        $temps = Storage::files('public/temp');
        foreach ($temps as $temp) {
            if ($timespan == 'm') {
                if (date('Y-m', Storage::lastModified($temp)) == date('Y-m', strtotime("-4 months"))) {
                    Storage::delete($temp);
                }
            } elseif ($timespan == 'y') {
                if (date('Y', Storage::lastModified($temp)) == date('Y', strtotime("-1 year"))) {
                    Storage::delete($temp);
                }
            }
        }

        return back();
    }
}
