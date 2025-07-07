<?php

namespace Fog\FogAdmin\Providers;

use Fog\FogAdmin\Console\Commands\BuildAssetsCommand;
use Fog\FogAdmin\Http\Middleware\Authenticate;
use Fog\FogAdmin\Http\Middleware\RedirectIfNotAdmin;
use Fog\FogAdmin\Support\PathHelper;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(PathHelper::getRootPath() . '/config/fog-admin.php', 'fog-admin');

        // Inject auth provider
        $providers = config('auth.providers', []);
        $providers['customer'] = config('fog-admin.auth.provider');
        config(['auth.providers' => $providers]);

        // Inject auth guard
        $guards = config('auth.guards', []);
        $guards['customer'] = config('fog-admin.auth.guard');
        config(['auth.guards' => $guards]);
    }

    /**
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        $this->loadViewsFrom(PathHelper::getRootPath() . '/resources/views', 'fog-admin');
        $this->loadMigrationsFrom(PathHelper::getRootPath() . '/database/migrations');

        $this->app->register(RouteServiceProvider::class);
        $this->mergeConfigFrom(PathHelper::getRootPath() . '/config/auth.php', 'auth');

        $this->configMiddleware();

        $this->publishes([
            PathHelper::getRootPath() . '/config/fog-admin.php' => config_path('fog-admin.php'),
            PathHelper::getRootPath() . '/public' => public_path('vendor/fog-admin'),

        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                BuildAssetsCommand::class,
            ]);
        }
    }

    /**
     * @throws BindingResolutionException
     */
    public function configMiddleware(): void
    {
        $middleware = $this->app->make(Router::class);

        $middleware->aliasMiddleware('auth.customer', RedirectIfNotAdmin::class);
        $middleware->aliasMiddleware('auth', Authenticate::class);
    }

    private function getProviderPath(): string
    {
        return Str::between(__DIR__, $this::class, '/src/Providers');
    }
}
