<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ModelEloquentMakeCommand extends GeneratorCommand
{
    protected $name = 'make:model-eloquent';

    protected $description = 'Make a ModelEloquent command';

    protected $type = 'ModelEloquent';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Infrastructure\Eloquent\\' . $this->argument('name');
    }

    protected function getStub()
    {
        return __DIR__.'/stub/ModelEloquent.stub';
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNameTable($stub, $this->argument('table'))
                    ->replaceNamespace($stub, $name)
                    ->replaceClass($stub, $name);
    }

    protected function replaceNameTable(&$stub, $table)
    {
        if(empty($table)) 
            $table = strtolower($this->argument('name'));

        $stub = str_replace('{{NameTable}}', $table, $stub);

        return $this;
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the class'],
            ['table', InputArgument::OPTIONAL, 'The name of the table'],
        ];
    }

    protected function getOptions()
    {
        return [
            ['interface', '-i', InputOption::VALUE_NONE, 'The name of the table'],
        ];
    }

    public function fire()
    {

        if($this->option('interface')){
            $this->call('make:model-interface', ['name' => $this->argument('name') . 'Interface']);
        }

        return parent::fire();
    }
}
