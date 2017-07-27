<?php

namespace App\Http\Composers\Runa;

use Illuminate\View\View;
use Jenssegers\Date\Date;
use App\Client;
use App\Product;
use App\Quotation;

class CashierViewComposer
{
    public function compose(View $view)
    {
        $view->terminated = Quotation::terminated('pendiente');
        $view->production = Quotation::production('pendiente');
        $view->finished = Quotation::production('finalizado');
        $view->credit = Quotation::where('status', 'credito')->get();
        $view->paid = Quotation::where('status', '!=', 'pendiente')
            ->where('status', '!=', 'cancelado')
            ->get();
    }
}
