<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class StoreDesignsController extends Controller
{
    function upload(Request $request)
    {
        $this->validate([
            'file' => 'required'
        ]);
        
        Storage::putFile('tests', new File($request->file));
    }
}
