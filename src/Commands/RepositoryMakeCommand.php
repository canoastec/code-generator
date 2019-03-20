<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;

class RepositoryMakeCommand extends GeneratorCommand
{
    protected $name = 'make:repository';

    protected $description = 'Make a Repository command';

    protected $type = 'Repository';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Infrastructure\Eloquent\\' . $this->getEntityName() ;
    }

    private function getEntityName()
    {
        return str_contains($this->argument('name'), 'Repository')
            ? str_replace('Repository', '', $this->argument('name'))
            : $this->argument('name');
    }

    private function getClassName()
    {
        return str_contains($this->argument('name'), 'Repository')
            ? $this->argument('name')
            : $this->argument('name') . 'Repository';
    }

    protected function getStub()
    {
        return __DIR__.'/stub/Repository.stub';
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceInterface($stub, $name)->replaceModel($stub, $name)
                    ->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    protected function replaceModel(&$stub, $name)
    {
        $modelName = $this->getEntityName();
        $stub = str_replace('{{ModelName}}', $modelName, $stub);

        return $this;
    }

    protected function replaceInterface(&$stub, $name)
    {
        $interfaceNamespace = $this->rootNamespace(). 'Repositories';
        $interfaceName = $this->getClassName() . 'Interface';

        $stub = str_replace('{{InterfaceNamespace}}', $interfaceNamespace, $stub);
        $stub = str_replace('{{InterfaceName}}', $interfaceName, $stub);

        return $this;
    }
}
