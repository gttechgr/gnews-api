<?php

namespace ErgonautTM\GNewsApi;

use Illuminate\Support\ServiceProvider;

class GNewsApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $configPath = __DIR__ . '/../config/gnewsapi.php';
        $this->publishes([$configPath => $this->getConfigPath()], 'config');
    }

    public function register()
    {
        $configPath = __DIR__ . '/../config/gnewsapi.php';
        $this->mergeConfigFrom($configPath, 'gnewsapi');

        $this->app->bind('gnews', function () {
            return new GNewsApi();
        });
    }

    /**
     * Publish the config file
     *
     * @param string $configPath
     */
    protected function publishConfig(string $configPath)
    {
        $this->publishes([$configPath => config_path('gnewsapi.php')], 'config');
    }

    /**
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath(): string
    {
        return config_path('gnewsapi.php');
    }
}
