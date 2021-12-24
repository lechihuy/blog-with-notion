<?php

namespace App\Services\Web\Providers;

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
                ->name('web.')
                ->namespace($this->namespace)
                ->group(__DIR__.'/../routes/web.php');
        });
    }
}
