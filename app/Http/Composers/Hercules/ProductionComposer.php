<?php

namespace App\Http\Composers\Hercules;

use Illuminate\View\View;
use App\Models\Hercules\HOrder;
use App\Models\Hercules\HPersonnel;

class ProductionComposer
{
    public function compose(View $view)
    {
        $view->pending = HOrder::where('status', 'pendiente')
                        ->orWhere('status', 'surtido soldadura')
                        ->get();
        $view->welding = HOrder::where('status', 'soldadura')
            ->orWhere('status', 'surtido fondeo')->get();
        $view->anchoring = HOrder::where('status', 'fondeo')
            ->orWhere('status', 'surtido vestido')->get();
        $view->clothing = HOrder::where('status', 'vestido')
            ->orWhere('status', 'surtido pintura')->get();
        $view->painting = HOrder::where('status', 'pintura')
            ->orWhere('status', 'surtido montaje')->get();
        $view->mounting = HOrder::where('status', 'montaje')->get();

        $view->terminated = HOrder::where('status', 'terminado')->get();

        $view->personnel = HPersonnel::all();
    }
}
