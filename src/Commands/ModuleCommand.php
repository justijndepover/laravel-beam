<?php

namespace Justijndepover\Beam\Commands;

use Illuminate\Console\Command;

class ModuleCommand extends Command
{
    protected $signature = 'beam:module';

    protected $description = 'Install a beam module';

    public function handle()
    {
        $model = $this->ask('What is the name of the model');
        $this->info('Done!');
    }
}
