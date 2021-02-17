<?php

namespace Justijndepover\Beam\Commands;

use Illuminate\Console\Command;

class ModuleCommand extends Command
{
    protected $signature = 'beam:module {--admin} {--api}';

    protected $description = 'Install a beam module';

    public function handle()
    {
        $model = ucfirst($this->ask('What is the name of the model'));

        $this->callSilent('make:model', [
            'name' => $model,
        ]);

        $this->callSilent('make:beam-controller', array_filter([
            'name' => "{$model}Controller",
            '--model' => $model,
            '--admin' => $this->option('admin'),
            '--api' => $this->option('api'),
        ]));

        $this->info('Done!');
    }
}
