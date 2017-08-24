<?php

namespace App\Http\Composers\Hercules;

use Illuminate\View\View;
use App\Models\Hercules\HOrder;

class ManagerComposer
{
    public function compose(View $view)
    {
        $view->pending = HOrder::where('status', 'surtido')->get();
        $view->welding = HOrder::where('status', 'soldadura')->get();
        $view->anchoring = HOrder::where('status', 'fondeo')->get();
        $view->clothing = HOrder::where('status', 'vestido')->get();
        $view->painting = HOrder::where('status', 'pintura')->get();
        $view->mounting = HOrder::where('status', 'montaje')->get();
    }
}
