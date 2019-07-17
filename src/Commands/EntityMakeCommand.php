<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class EntityMakeCommand extends Command
{
    protected $signature = 'make:entity {name}';

    protected $description = 'Make a Entity command';

    public function handle()
    {
        $this->call('make:repository-interface', ['name' => $this->argument('name') . 'RepositoryInterface']);
        $this->call('make:repository', ['name' => $this->argument('name') . 'Repository']);
        $this->call('make:repository-bindings', ['entity' => $this->argument('name')]);
        $this->call('make:model-interface', ['name' => $this->argument('name').'Interface']);
        $this->call('make:model-eloquent', ['name' => $this->argument('name')]);
    }
}
