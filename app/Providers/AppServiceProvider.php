<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Laravel\Dusk\DuskServiceProvider;
use App\Http\Composers\Runa\QuotationsComposer;
use App\Http\Composers\Runa\ProductionComposer;
use App\Http\Composers\Runa\CashierViewComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->registerViewComposers();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }

    protected function registerViewComposers()
   {
       View::composer('runa.quotations.*', QuotationsComposer::class);
       View::composer('runa.cashier.*', CashierViewComposer::class);
       View::composer('runa.production.*', ProductionComposer::class);
   }
}
