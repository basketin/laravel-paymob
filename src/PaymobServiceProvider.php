<?php

namespace Basketin\Paymob;

use Illuminate\Support\ServiceProvider;

class PaymobServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/paymob.php', 'basketin.paymob');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/paymob.php' => config_path('basketin/paymob.php'),
            ], ['basketin-paymob-config']);

            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
    }
}
