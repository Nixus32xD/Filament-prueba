<?php

namespace App\Providers;

use App\Models\StockMovement;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        StockMovement::observe(\App\Observers\StockMovementObserver::class);
    }
}
