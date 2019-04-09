<?php

namespace CodeGenerator;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\DaoMakeCommand::class,
                Commands\ModelEloquentMakeCommand::class,
                Commands\RepositoryInterfaceMakeCommand::class,
                Commands\ViewComposerMakeCommand::class,
                Commands\ViewEditMakeCommand::class,
                Commands\ViewMakeCommand::class,
                Commands\MakeMakeCommand::class,
                Commands\ModelInterfaceMakeCommand::class,
                Commands\RepositoryMakeCommand::class,
                Commands\ViewCreateMakeCommand::class,
                Commands\ViewFormMakeCommand::class,
                Commands\ViewPresenterMakeCommand::class,
                Commands\MakeViewComposerCommand::class,
                Commands\RepositoryBindingsMakeCommand::class,
                Commands\ServiceMakeCommand::class,
                Commands\ViewCrudMakeCommand::class,
                Commands\ViewIndexMakeCommand::class,
            ]);
        }
    }
}
?>
