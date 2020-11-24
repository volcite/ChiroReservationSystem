<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CalendarService;

class CalendarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CalendarService::class, CalendarService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}