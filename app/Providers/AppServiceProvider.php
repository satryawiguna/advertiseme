<?php

namespace App\Providers;

use App\Core\Contract\IService;
use App\Services\BaseService;
use App\Services\ContentService;
use App\Services\Contracts\IContentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IService::class, BaseService::class);
        $this->app->bind(IContentService::class, ContentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
