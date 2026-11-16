<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

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
        Http::macro('api', function () {
            return Http::withHeaders([
                'x-client-id' => 'boronkay',
                'x-api-key' => '356e3a0ecd646ce237b5780b6069903fbeeb1e1d08b30d6c',
            ])->baseUrl(config('services.api.base_url'));
        });
    }
}
