<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $isLocalHost = in_array(request()->getHost(), ['localhost', '127.0.0.1', '::1']);
        if (!$isLocalHost && (config('app.env') === 'production' || request()->header('x-forwarded-proto') === 'https')) {
            URL::forceScheme('https');
        }
    }
}
