<?php

namespace App\Providers;

use App\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
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
        View::composer(['partials.navbar', 'albums.create', 'albums.edit'], function ($view) {
            $view->with('collections', Collection::all());
        });

        View::share('isFrontPage', Request::url() === url('/'));
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
