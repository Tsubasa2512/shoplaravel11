<?php

namespace App\Providers;

use App\Repositories\BaseRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use App\Services\BaseServiceInterface;
use App\Services\CategoryService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //cấu hình từng file riêng -  interface riêng
        // $this->app->bind(BaseRepositoryInterface::class, UserRepository::class);
        // $this->app->bind(BaseServiceInterface::class, UserService::class);

        //Cấu hình kế thừa từ BaseRepository [Contextual Binding] - tránh xung đột
        $this->app->when(UserService::class)->needs(BaseRepositoryInterface::class)->give(UserRepository::class);
        $this->app->when(concrete: CategoryService::class)->needs(BaseRepositoryInterface::class)->give(CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
