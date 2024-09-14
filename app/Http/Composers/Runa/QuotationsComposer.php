<?php

namespace App\Http\Composers\Runa;

use Illuminate\View\View;
use Jenssegers\Date\Date;
use App\Client;
use App\Product;
use App\Quotation;

class QuotationsComposer
{
    public function compose(View $view)
    {
        $view->clients = Client::pluck('name', 'id')->toArray();
        $view->folio = $this->getFolio();
        $view->lastQ = Quotation::latest()->first();
        $view->products = Product::pluck('name', 'id')->toArray();
        $view->date = Date::now()->format('Y-m-d');
    }

    public function getFolio()
    {
        $lastQ = Quotation::latest()->first();
        $lastY = fdate($lastQ->created_at, 'Y');

        if(date('Y') != $lastY) {
            return 0;
        }

        return $lastQ->folio;
    }
}
