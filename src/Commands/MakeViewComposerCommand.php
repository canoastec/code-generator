<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeViewComposerCommand extends GeneratorCommand
{
    protected $name = 'make:viewcomposer';

    protected $description = 'Make a View Composer';

    protected $type = 'View Composer';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\ViewComposers';
    }

    protected function getStub()
    {
        return __DIR__.'/../../stubsViewComposer.stub';
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceVariableName($stub, $this->argument('variable'))
                    ->replaceNamespace($stub, $name)
                    ->replaceClass($stub, $name);
    }

    protected function replaceVariableName(&$stub, $name)
    {
        $stub = $this->files->get($this->getStub());
        $stub = str_replace('{{VariableName}}', $name, $stub);

        return $this;
    }

    protected function getArguments()
    {
        return [
            ['name', 1, 'The name of the class'],
            ['variable', 1, 'The variable name of returned data'],
            ['repository', 2, 'The variable of repository to be injected'],
        ];
    }
}
