<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Environment\Environment;
use Torchlight\Commonmark\V2\TorchlightExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MarkdownConverter::class, function ($app) {
            $environment = new Environment();
            $environment->addExtension(new CommonMarkCoreExtension);
            $environment->addExtension(new TorchlightExtension);

            return new MarkdownConverter($environment);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
