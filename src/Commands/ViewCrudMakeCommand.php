<?php

namespace CodeGenerator\Commands;

use Illuminate\Console\Command;

class ViewCrudMakeCommand extends Command
{
    protected $signature = 'make:view-crud {name}';

    protected $description = 'Make a View Crud command';

    public function handle()
    {
        $name = $this->argument('name');

        $this->call('make:view-index', ['name' => $name]);
        $this->call('make:view-create', ['name' => $name]);
        $this->call('make:view-form', ['name' => $name]);
        $this->call('make:view-edit', ['name' => $name]);

        return $this;
    }    
            
}
