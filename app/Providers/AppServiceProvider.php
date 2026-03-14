<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\WebSettings;
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
        //
        $getWebData = WebSettings::first();
        View::share('getWebData', $getWebData);

        // $getProduct = Product::all();
        // View::share('getProduct', $getProduct);

        // View::composer(['frontend.*'], function ($view) {
        //     $view->with('getProduct', Product::all());
        // });
    }
}
