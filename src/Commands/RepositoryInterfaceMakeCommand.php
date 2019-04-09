<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;

class RepositoryInterfaceMakeCommand extends GeneratorCommand
{
    protected $name = 'make:repository-interface';

    protected $description = 'Make a Interface of Repository command';

    protected $type = 'Interface of Repository';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }

    protected function getStub()
    {
        return __DIR__.'/../../stubs/RepositoryInterface.stub';
    }

    protected function buildClass($name)
    {
        return parent::buildClass($name);
    }
}
