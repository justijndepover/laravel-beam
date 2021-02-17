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
                Commands\FileStructureCommand::class,
                Commands\StubsCommand::class,
                Commands\ModuleCommand::class,
                Commands\MakeActionCommand::class,
                Commands\MakeBeamControllerCommand::class,
            ]);
        }
    }

    public function boot()
    {
    }
}
