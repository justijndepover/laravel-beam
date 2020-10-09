<?php

namespace Justijndepover\Scaffolding\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'scaffold:install';

    protected $description = 'Install basic scaffolding';

    public function handle()
    {
        $this->info('Installing the assets');
        $this->info('Done!');
    }
}
