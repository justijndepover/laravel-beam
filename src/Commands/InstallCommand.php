<?php

namespace Justijndepover\Scaffolding\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class InstallCommand extends Command
{
    protected $signature = 'scaffold:install';

    protected $description = 'Install basic scaffolding';

    private $paths = [
        'Http/Controllers/Admin',
        'Http/Controllers/Api',
        'Models',
        'Models/Scopes',
        'Models/Traits',
        'Models/Translations',
    ];

    public function handle()
    {
        $this->info('Installing the assets');
        $this->ensureDirectoriesExist();
        $this->setupModels();
        $this->info('Done!');
    }

    private function ensureDirectoriesExist()
    {
        foreach ($this->paths as $path) {
            if (!is_dir($directory = app_path($path))) {
                mkdir($directory, 0755, true);
            }
        }
    }

    private function setupModels()
    {
        $filesystem = new Filesystem;

        collect($filesystem->allFiles(__DIR__ . '/../../stubs/Models'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Models/' . $file->getRelativePath() . '/' . Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });
    }
}
