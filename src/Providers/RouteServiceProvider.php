<?php

namespace Fog\FogAdmin\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $path = Str::between(__DIR__, $this::class, '/src/Providers');

        $this->routes(function ()  use ($path) {
            Route::middleware('web')->group($path.'/routes/web.php');
            Route::middleware('web')->group($path.'/routes/customer.php');
            Route::middleware('web')->group($path.'/routes/admin.php');
            Route::middleware('api')->group($path.'/routes/api.php');
        });
    }
}
