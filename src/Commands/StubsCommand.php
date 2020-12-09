<?php

namespace Justijndepover\Beam\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class StubsCommand extends Command
{
    protected $signature = 'beam:stubs';

    protected $description = 'Setup the beam stubs';

    public function handle()
    {
        $this->ensureDirectoryExists();
        $this->copyDefaultStubs();
    }

    private function ensureDirectoryExists()
    {
        if (! is_dir($stubsPath = $this->laravel->basePath('stubs'))) {
            (new Filesystem)->makeDirectory($stubsPath);
        }
    }

    private function copyDefaultStubs()
    {
        $filesystem = new Filesystem;

        collect($filesystem->allFiles(__DIR__ . '/../../stubs/defaults'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    base_path('stubs/' . $file->getRelativePath() . '/' . $file->getFilename())
                );
            });
    }
}
