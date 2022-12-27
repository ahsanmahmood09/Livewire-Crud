<?php

namespace App\Providers;

use App\Repository\Base\BaseRepository;
use App\Repository\Base\Interfaces\BaseRepositoryInterface;
use App\Repository\Users\UserRepository;
use App\Repository\Users\Interfaces\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        
    }
}
