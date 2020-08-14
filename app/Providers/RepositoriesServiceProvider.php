<?php

namespace App\Providers;

use App\Repositories\CartRepository;
use App\Repositories\CartRepositoryInterFace;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

       $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(CartRepositoryInterFace::class,CartRepository::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
