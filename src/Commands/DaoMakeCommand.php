<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;

class DaoMakeCommand extends GeneratorCommand
{
    protected $name = 'make:dao';

    protected $description = 'Make a DAO command';

    protected $type = 'DAO';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Infrastructure\DAO';
    }

    protected function getStub()
    {
        return __DIR__.'/../stubs/DAO.stub';
    }

    protected function buildClass($name)
    {
        return parent::buildClass($name);
    }
}
