<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['animal._form','include.search_bar'], function ($view) {
            view()->share('region', \App\Region::all()->lists('name', 'id')->toArray());
        });
        view()->composer(['animal._form','include.search_bar'], function ($view) {
            view()->share('type', \App\Type::all()->lists('name', 'id')->toArray());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
