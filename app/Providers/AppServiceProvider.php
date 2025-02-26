<?php

namespace App\Providers;

use App\Interfaces\UrlShortenerServiceInterface;
use App\Services\UrlShortenerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UrlShortenerServiceInterface::class, UrlShortenerService::class);
    }

    public function boot()
    {
        //
    }
}
