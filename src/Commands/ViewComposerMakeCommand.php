<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;

class ViewComposerMakeCommand extends GeneratorCommand
{
    protected $name = 'make:view-composer';

    protected $description = 'Make a view composer';

    protected $type = 'View Composer';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/ViewComposer.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\ViewComposers';
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceVariableName($stub)
                    ->replaceNamespace($stub, $name)
                    ->replaceClass($stub, $name);
    }

    protected function replaceVariableName(&$stub)
    {
        $stub = str_replace('{{VariableName}}', $this->argument('variable'), $stub);

        return $this;
    }

    protected function getArguments()
    {
        return [
            ['name', 1, 'The name of the class'],
            ['variable', 1, 'The name of the variable passed to view']
        ];
    }
}
