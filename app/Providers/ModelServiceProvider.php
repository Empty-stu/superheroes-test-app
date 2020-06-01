<?php

namespace App\Providers;

use App\ImageModel;
use App\SuperheroModel;
use App\SuperpowerModel;
use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ImageModel::class, function () {
            return new ImageModel();
        });
        $this->app->bind(SuperheroModel::class, function () {
            return new SuperheroModel();
        });
        $this->app->bind(SuperpowerModel::class, function () {
            return new SuperpowerModel();
        });
    }
}
