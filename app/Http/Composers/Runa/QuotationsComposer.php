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
        $view->lastQ = Quotation::all()->last();
        $view->products = Product::pluck('name', 'id')->toArray();
        $view->date = Date::now()->format('Y-m-d');
    }
}
