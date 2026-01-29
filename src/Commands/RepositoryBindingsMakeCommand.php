<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class RepositoryBindingsMakeCommand extends GeneratorCommand
{
    protected $name = 'make:repository-bindings';

    protected $description = 'Make a Repository Bindings command';

    protected $type = 'Bindings';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Providers';
    }

    protected function getStub()
    {
        return app_path().'/Providers/InjectionServiceProvider.php';
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->addBindings($stub)
                    ->addUse($stub)
                    ->replaceClass($stub, $name);
    }

    private function addBindings(&$stub)
    {
        $entity = str_contains($this->argument('entity'), 'Repository') 
            ? str_replace('Repository', '', $this->argument('entity'))
            : $this->argument('entity');

        $bindings = '$this->app->bind('.$entity.'RepositoryInterface::class, '.$entity.'Repository::class);';
        $referencePoint = "\n\t\t//:end-bindings:";
        $stub = str_replace('//:end-bindings:', $bindings.$referencePoint, $stub);
        return $this;
    }
    
    private function addUse(&$stub)
    {
        $entity = str_contains($this->argument('entity'), 'Repository') 
            ? str_replace('Repository', '', $this->argument('entity'))
            : $this->argument('entity');

        $pathRepositoryInterface = "use ".$this->rootNamespace()."Repositories\\".$entity."RepositoryInterface;";
        $pathRepository = "use ".$this->rootNamespace()."Infrastructure\\Eloquent\\".$entity."\\".$entity."Repository;";

        $referencePoint = "\n//:end-use:";
        $stub = str_replace('//:end-use:', $pathRepositoryInterface."\n".$pathRepository.$referencePoint, $stub);
        return $this;
    }

    protected function getNameInput()
    {
        return 'InjectionServiceProvider';
    }

    protected function getArguments()
    {
        return [
            ['entity', InputArgument::REQUIRED, 'The name of the entity for make binding of the repository']
        ];
    }

    protected function alreadyExists($rawName)
    {
        return false;
    }
}
