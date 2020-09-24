<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\BlameableObserver;
use App\Terms;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Terms::observe(BlameableObserver::class);
    }
}
