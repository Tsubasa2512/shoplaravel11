<?php

namespace App\Providers;

use App\Repositories\BaseRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\BaseServiceInterface;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BaseServiceInterface::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
