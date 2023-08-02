<?php

namespace App\Providers;

use App\Interfaces\EmployeeRepositoryInterfaces;
use App\Interfaces\StoreRepositoryInterfaces;
use App\Repository\EmployeeRepository;
use App\Repository\StoreRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StoreRepositoryInterfaces::class, StoreRepository::class);
        $this->app->bind(EmployeeRepositoryInterfaces::class, EmployeeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
