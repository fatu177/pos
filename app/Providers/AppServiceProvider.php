<?php

namespace App\Providers;

use App\Http\Middleware\Admin;
use App\Http\Middleware\Kasir;
use App\Http\Middleware\Pimpinan;
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
        $this->app['router']->aliasMiddleware('Admin', Admin::class);
        $this->app['router']->aliasMiddleware('Kasir', Kasir::class);
        $this->app['router']->aliasMiddleware('Pimpinan', Pimpinan::class);
    }
}