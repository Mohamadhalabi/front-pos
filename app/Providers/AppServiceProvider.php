<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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

        $response = Http::withHeaders([
            'Accept-Language' => app()->getLocale(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'secret-key' => env('SECRET_KEY', 'default_value'),
            'api-key' => env('API_KEY', 'default_value'),
        ])->get(env('API_BASE_URL', 'default_value') . '/get-settings');
        $data = $response->json();        

        View::share('settings', $data);
    }
}
