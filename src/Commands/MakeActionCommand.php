<?php

namespace Justijndepover\Beam\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeActionCommand extends GeneratorCommand
{
    protected $signature = 'make:action {name : The name of the class}';
    protected $description = 'Create a new Action class';
    protected $type = 'Action';

    protected function getStub()
    {
        return base_path('stubs/action.stub');
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Actions';
    }

    protected function getNameInput()
    {
        $name = trim($this->argument('name'));

        if (substr($name, -6, 6) != 'Action') {
            return $name . 'Action';
        } else {
            return $name;
        }
    }
}