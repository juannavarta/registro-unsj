<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FileAnimalService;
use App\Contracts\AnimalServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AnimalServiceInterface::class, FileAnimalService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
