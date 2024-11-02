<?php

namespace Modules\WebApp\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Modules\Base\Traits\RouteRegistrar;

class RouteServiceProvider extends ServiceProvider
{
    use RouteRegistrar;

    protected function getRouteDirectory(): string
    {
        return __DIR__.'/../../routes';
    }
}
