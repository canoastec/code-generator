<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;

class ModelInterfaceMakeCommand extends GeneratorCommand
{
    protected $name = 'make:model-interface';

    protected $description = 'Make a ModelInterface command';

    protected $type = 'ModelInterface';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Domain\\' . $this->getModelName();
    }

    protected function getStub()
    {
        return __DIR__.'/stub/ModelInterface.stub';
    }

    protected function buildClass($name)
    {
        return parent::buildClass($name);
    }

    private function getModelName()
    {
        return str_contains($this->argument('name'), 'Interface')
            ? str_replace('Interface', '', $this->argument('name'))
            : $this->argument('name');
    }
}
