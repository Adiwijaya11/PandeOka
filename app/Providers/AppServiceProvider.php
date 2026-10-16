<?php

namespace App\Providers;

use App\Services\CartService;
use Illuminate\Support\Facades\View;
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
        View::composer(['partials.navbar', 'layouts.app'], function ($view) {
            $view->with('globalCartCount', CartService::getCount());
            $view->with('globalCartSummary', CartService::getSummary());
        });
    }
}
