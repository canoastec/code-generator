<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;

class ServiceMakeCommand extends GeneratorCommand
{
    protected $name = 'make:service';

    protected $description = 'Make a Service command';

    protected $type = 'Service';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Services';
    }

    protected function getStub()
    {
        return __DIR__.'/../../stubs/Service.stub';
    }

    protected function buildClass($name)
    {
        return parent::buildClass($name);
    }
}
