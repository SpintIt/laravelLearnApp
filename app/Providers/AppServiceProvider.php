<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Services\Notification\NotificationService;
use App\Services\ImageStorage\IImageStorageService;
use App\Services\Notification\INotificationService;
use App\Services\ImageStorage\ImageStorageDiskService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(INotificationService::class, NotificationService::class);
        $this->app->bind(IImageStorageService::class, ImageStorageDiskService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.custom-tailwind');
    }
}
