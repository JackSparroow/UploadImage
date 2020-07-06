<?php

namespace Codestacx\Uploaders;

use Codestacx\Uploaders\Traits\Uploader;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class UploaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('fileuploader', function($app) {
            return new Uploader();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }
}
