<?php

namespace ProjetoPadrao\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class ViewCreateMakeCommand extends GeneratorCommand
{
    protected $name = 'make:view-create';

    protected $description = 'Make a View Create command';

    protected $type = 'View Create';    

    protected function getStub()
    {
        return __DIR__.'/../stub/blade-view/create.stub';
    }

    protected function replaceModelRouteName(&$stub, $name)
    {        
        $stub = str_replace('{{ModelRoute}}', $name, $stub);
        return $this;
    }

    protected function replaceFolderName(&$stub, $name)
    {
        $stub = str_replace('{{FolderName}}', $name, $stub);
        return $stub;
    }

    protected function getPath($name)
    {
        return resource_path('views/' . $this->argument('name') . '/create.blade.php' );
    }

    protected function buildClass($name)
    {       
        $stub = parent::buildClass($name);

        if (empty($this->argument('modelRoute'))){
            $this->replaceModelRouteName($stub, $this->argument('name'));
        } else {
            $this->replaceModelRouteName($stub, $this->argument('modelRoute'));
        }

        return $this->replaceFolderName($stub, $this->argument('name'));
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The view folder name'],
            ['modelRoute', InputArgument::OPTIONAL, 'The model route name' ]
        ];
    }
}
