<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        RateLimiter::for('api_files', function (Request $request) {
            $count = config('photogps.limit.files.rate.count', 6);
            $per = config('photogps.limit.files.rate.per', 'minute');
            $method = 'per' . Str::ucfirst($per);
            return Limit::{$method}($count)
                ->by($request->user()?->id ?: $request->ip());
        });
        RateLimiter::for('api_upload', function (Request $request) {
            $count = config('photogps.limit.upload.rate.count', 6);
            $per = config('photogps.limit.upload.rate.per', 'minute');
            $method = 'per' . Str::ucfirst($per);
            return Limit::{$method}($count)
                ->by($request->user()?->id ?: $request->ip());
        });
    }
}
