<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeMakeCommand extends GeneratorCommand
{
    protected $name = 'make:make';

    protected $description = 'Make a Make command';

    protected $type = 'Make Command';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Console\Commands';
    }

    protected function getStub()
    {
        return __DIR__.'/../stubs/Make.stub';
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceType($stub, $this->argument('type'))
                    ->replaceNamespace($stub, $name)
                    ->replaceClass($stub, $name);
    }

    protected function replaceType(&$stub, $type)
    {
        $stub = str_replace('{{Type}}', $type, $stub);

        return $this;
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the class'],
            ['type', InputArgument::REQUIRED, 'The type of generated thing (Model, Repository, View)'],
        ];
    }
}
