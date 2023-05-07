<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\HashtagsService;
use Illuminate\Contracts\Foundation\Application;

class HashtagsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(HashtagsService::class, function (Application $app) {
            return new HashtagsService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
