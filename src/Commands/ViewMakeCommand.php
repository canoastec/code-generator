<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;

class ViewMakeCommand extends GeneratorCommand
{
    protected $name = 'make:view';

    protected $description = 'Make a View command';

    protected $type = 'View';

    protected function getStub()
    {
        return __DIR__.'/../stub/blade-view/default.stub';
    }

    protected function buildClass($name)
    {
        return parent::buildClass($name);
    }

    protected function getPath($name)
    {
        return resource_path('views/' . $this->argument('name') . '.blade.php' );
    }
}
