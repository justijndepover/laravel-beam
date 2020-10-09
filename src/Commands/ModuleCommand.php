<?php

namespace Justijndepover\Scaffolding\Commands;

use Illuminate\Console\Command;

class ModuleCommand extends Command
{
    protected $signature = 'scaffold:module';

    protected $description = 'Install a module';

    public function handle()
    {
        $model = $this->ask('What is the name of the model');
        $this->info('Done!');
    }
}
