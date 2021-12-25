<?php

namespace App\Services\Admin\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->routes(function () {
            Route::middleware('web')
                ->name('admin.')
                ->prefix('admin')
                ->namespace($this->namespace)
                ->group(__DIR__.'/../routes/web.php');
        });
    }
}
