<?php

namespace App\Http\Composers\Runa;

use Illuminate\View\View;
use App\Quotation;

class ProductionComposer
{
    public function compose(View $view)
    {
        $view->pending = Quotation::production('autorizado');
        $view->completed = Quotation::production('terminado');
        $view->authorized = Quotation::production('asignado');
        $view->production = Quotation::production('produccion');
        $view->terminated = Quotation::production('finalizado');
    }
}
