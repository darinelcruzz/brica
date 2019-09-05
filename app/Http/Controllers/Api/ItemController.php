<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hercules\HItem;

class ItemController extends Controller
{
    function index()
    {
        return HItem::where('type', 'inventario')
            ->where('family', 'remolques')
            ->selectRaw('id, CONCAT(description, ", (", stock, " en existencia)") as description, unity, price')
            ->get();
    }
}
