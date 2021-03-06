<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Laravel\Dusk\DuskServiceProvider;
use App\Http\Composers\Runa\QuotationsComposer;
use App\Http\Composers\Runa\ProductionComposer;
use App\Http\Composers\Runa\CashierViewComposer;
use App\Http\Composers\Hercules\BodyworkComposer;
use App\Http\Composers\Hercules\ProductionComposer as HProductionComposer;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->registerViewComposers();
    }

    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }

    protected function registerViewComposers()
   {
       View::composer('runa.quotations.*', QuotationsComposer::class);
       View::composer('runa.cashier.index', CashierViewComposer::class);
       View::composer('runa.production.*', ProductionComposer::class);
       View::composer('hercules.bodyworks.*', BodyworkComposer::class);
       View::composer('hercules.production.*', HProductionComposer::class);
   }
}
