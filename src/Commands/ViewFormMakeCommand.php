<?php

namespace ProjetoPadrao\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ViewFormMakeCommand extends GeneratorCommand
{
    protected $name = 'make:view-form';

    protected $description = 'Make a View Form command';

    protected $type = 'View Form';

    protected function getStub()
    {
        return __DIR__.'/../stub/blade-view/form.stub';
    }    

    protected function getPath($name)
    {
        return resource_path('views/' . $this->argument('name') . '/form.blade.php' );
    }
    
}
