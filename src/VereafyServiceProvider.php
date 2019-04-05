<?php

namespace Cecula\Vereafy;

use Illuminate\Support\ServiceProvider;

class VereafyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Register our controller
        $this->app->make('Cecula\Vereafy\vereafyController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Boot our route
        $this->loadRoutesFrom(__DIR__.'routes/api.php');
    }
}
