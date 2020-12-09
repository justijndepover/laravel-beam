<?php

namespace Justijndepover\Beam;

use Illuminate\Support\ServiceProvider;

class BeamServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\InstallCommand::class,
                Commands\ModuleCommand::class,
            ]);
        }
    }

    public function boot()
    {
    }
}
