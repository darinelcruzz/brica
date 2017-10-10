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

        $view->personnel = HPersonnel::where('active', 1)->get();

        $view->header = ['Orden', 'Descripción', 'Entrega', 'Asignado a', 'Inicio', 'Selecciona equipo', 'Mover a'];

        $view->processes = [
            ['english' => 'welding', 'spanish' => 'soldadura', 'color' => 'warning',
             'next' => ['e' => 'anchoring', 's' => 'fondeo']],
            ['english' => 'anchoring', 'spanish' => 'fondeo', 'color' => 'success',
             'next' => ['e' => 'clothing', 's' => 'vestido']],
            ['english' => 'clothing', 'spanish' => 'vestido', 'color' => 'default',
             'next' => ['e' => 'painting', 's' => 'pintura']],
            ['english' => 'painting', 'spanish' => 'pintura', 'color' => 'info',
             'next' => ['e' => 'mounting', 's' => 'montaje']],
            ['english' => 'mounting', 'spanish' => 'montaje', 'color' => 'danger',
             'next' => ['e' => 'finished', 's' => 'terminado']],
        ];
    }
}
