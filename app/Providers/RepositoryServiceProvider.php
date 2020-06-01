<?php

namespace App\Providers;

use App\Repositories\Contracts\ImageRepositoryInterface;
use App\Repositories\Contracts\SuperheroRepositoryInterface;
use App\Repositories\Contracts\SuperpowerRepositoryInterface;
use App\Repositories\ImageRepository;
use App\Repositories\SuperheroRepository;
use App\Repositories\SuperpowerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(ImageRepositoryInterface::class, ImageRepository::class);
        $this->app->singleton(SuperheroRepositoryInterface::class, SuperheroRepository::class);
        $this->app->singleton(SuperpowerRepositoryInterface::class, SuperpowerRepository::class);
    }
}
