<?php

namespace App\Providers;

use Carbon\Carbon; // ДОБАВИЛИ
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // ДОБАВИЛИ

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
			Carbon::setLocale('ru_RU');
			Paginator::useBootstrapFive();
			Paginator::useBootstrapFour();
		}
}
