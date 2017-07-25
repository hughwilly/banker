<?php

namespace HughWilly\Banker;

use Illuminate\Support\ServiceProvider;

class BankerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->setUpConfig();

        $this->app->singleton('banker', function () {
            return new Banker;
        });

        $this->app->alias('banker', Banker::class);
    }

    public function setUpConfig()
    {
        $source = realpath(__DIR__ . '/../config/banker.php');

        $this->publishes([__DIR__ . '/../config/banker.php' => config_path('banker.php')], 'config');

        $this->mergeConfigFrom($source, 'banker');
    }

    public function provides()
    {
        return [Banker::class];
    }
}