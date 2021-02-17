<?php

namespace Justijndepover\Beam\Commands;

use Illuminate\Console\GeneratorCommand;
use InvalidArgumentException;
use Symfony\Component\Console\Input\InputOption;
use Str;

class MakeBeamControllerCommand extends GeneratorCommand
{
    protected $signature = 'make:beam-controller {name : The name of the controller} {--model= : The name of the model} {--admin} {--api}';
    protected $description = 'Create a new Beam controller class';
    protected $type = 'Controller';

    protected function getStub()
    {
        if ($this->option('admin')) {
            $stub = '/stubs/controller.beam.admin.stub';
        } elseif ($this->option('api')) {
            $stub = '/stubs/controller.beam.api.stub';
        } else {
            $stub = '/stubs/controller.beam.stub';
        }

        return base_path($stub);
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->option('admin')) {
            $namespace = '\Http\Controllers\Admin';
        } elseif ($this->option('api')) {
            $namespace = '\Http\Controllers\Api';
        } else {
            $namespace = '\Http\Controllers';
        }

        return $rootNamespace . $namespace;
    }

    protected function buildClass($name)
    {
        $controllerNamespace = $this->getNamespace($name);

        $replace = [];

        if ($this->option('model')) {
            $replace = $this->buildModelReplacements($replace);
        }

        $replace["use {$controllerNamespace}\Controller;\n"] = '';

        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
    }

    protected function buildModelReplacements(array $replace)
    {
        $modelClass = $this->parseModel($this->option('model'));

        if (! class_exists($modelClass)) {
            if ($this->confirm("A {$modelClass} model does not exist. Do you want to generate it?", true)) {
                $this->call('make:model', ['name' => $modelClass]);
            }
        }

        return array_merge($replace, [
            'DummyFullModelClass' => $modelClass,
            '{{ namespacedModel }}' => $modelClass,
            '{{namespacedModel}}' => $modelClass,
            'DummyModelClass' => class_basename($modelClass),
            '{{ model }}' => class_basename($modelClass),
            '{{model}}' => class_basename($modelClass),
            'DummyModelVariable' => lcfirst(class_basename($modelClass)),
            '{{ modelVariable }}' => lcfirst(class_basename($modelClass)),
            '{{modelVariable}}' => lcfirst(class_basename($modelClass)),
            '{{ modelSingular }}' => Str::snake(class_basename($modelClass)),
        ]);
    }

    protected function parseModel($model)
    {
        if (preg_match('([^A-Za-z0-9_/\\\\])', $model)) {
            throw new InvalidArgumentException('Model name contains invalid characters.');
        }

        return $this->qualifyModel($model);
    }

    protected function getOptions()
    {
        return [
            ['admin', null, InputOption::VALUE_NONE, 'Create the class in the admin namespace'],
            ['api', null, InputOption::VALUE_NONE, 'Create the class in the admin namespace. Exclude the create and edit methods from the controller.'],
        ];
    }

    protected function getNameInput()
    {
        $name = trim($this->argument('name'));

        if (substr($name, -10, 10) != 'Controller') {
            return $name . 'Controller';
        } else {
            return $name;
        }
    }
}
