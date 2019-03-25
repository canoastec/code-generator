<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;

class ViewPresenterMakeCommand extends GeneratorCommand
{
    protected $name = 'make:presenter';

    protected $description = 'Make a ViewPresenter command';

    protected $type = 'ViewPresenter';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Presenters';
    }

    protected function getStub()
    {
        return __DIR__.'/stub/ViewPresenter.stub';
    }

    protected function buildClass($name)
    {
        return parent::buildClass($name);
    }
}
