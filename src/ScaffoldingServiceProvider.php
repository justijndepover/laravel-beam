<?php

namespace Justijndepover\Scaffolding;

use Illuminate\Support\ServiceProvider;

class ScaffoldingServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\InstallCommand::class,
            ]);
        }
    }

    public function boot()
    {

    }
}