<?php

namespace ProjetoPadrao\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class ViewIndexMakeCommand extends GeneratorCommand
{
    protected $name = 'make:view-index';

    protected $description = 'Make a View Index command';

    protected $type = 'View Index';    

    protected function getStub()
    {
        return __DIR__.'/../stub/blade-view/index.stub';
    }    

    protected function replaceModelRouteName(&$stub, $name)
    {
        $stub = $this->files->get($this->getStub());
        return str_replace('{{ModelRoute}}', $name, $stub);
    }

    protected function getPath($name)
    {
        return resource_path('views/' . $this->argument('name') . '/index.blade.php' );
    }

    protected function buildClass($name)
    {       
        $stub = parent::buildClass($name);

        if (empty($this->argument('modelRoute'))){
            return $this->replaceModelRouteName($stub, $this->argument('name'));
        }

        return $this->replaceModelRouteName($stub, $this->argument('modelRoute'));
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The view folder name'],
            ['modelRoute', InputArgument::OPTIONAL, 'The model route name' ]
        ];
    }
}