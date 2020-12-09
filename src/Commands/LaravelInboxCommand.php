<?php

namespace Justijndepover\Beam\Commands;

use Illuminate\Console\Command;

class LaravelInboxCommand extends Command
{
    protected $signature = 'beam:laravel-inbox';

    protected $description = 'Setup Laravel Inbox';

    public function handle()
    {
        $this->info('Installing Laravel Inbox...');
        $this->info('All done!');
    }
}
