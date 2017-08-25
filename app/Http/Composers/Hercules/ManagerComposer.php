<?php

namespace App\Http\Composers\Hercules;

use Illuminate\View\View;
use App\Models\Hercules\HOrder;

class ManagerComposer
{
    public function compose(View $view)
    {
        $view->pending = HOrder::where('status', 'surtido soldadura')->get();
        $view->welding = HOrder::where('status', 'soldadura')
            ->orWhere('status', 'surtido fondeo')->get();
        $view->anchoring = HOrder::where('status', 'fondeo')
            ->orWhere('status', 'surtido vestido')->get();
        $view->clothing = HOrder::where('status', 'vestido')
            ->orWhere('status', 'surtido pintura')->get();
        $view->painting = HOrder::where('status', 'pintura')
            ->orWhere('status', 'surtido montaje')->get();
        $view->mounting = HOrder::where('status', 'montaje')->get();
    }
}
