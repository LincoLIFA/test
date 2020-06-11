<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\ImageManager;

class ImageManagerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\ImageManager', function ($app) {
            return new ImageManager();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
