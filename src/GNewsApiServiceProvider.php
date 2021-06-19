<?php

namespace ErgonautTM\GNewsApi;

use Illuminate\Support\ServiceProvider;

class GNewsApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->configurePublishing();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/gnewsapi.php', 'gnewsapi');

        $this->app->bind('gnews', function () {
            return new GNewsApi();
        });
    }

    /**
     * Configure the publishable resources offered by the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        $this->publishes([
            __DIR__.'/../config/gnewsapi.php' => config_path('gnewsapi.php'),
        ], 'config');
    }
}
