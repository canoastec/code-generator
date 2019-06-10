# code-generator

composer require canoastec/code-generator

SERVICE
php artisan make:service NomeDoServico

VIEW COMPOSER
php artisan make:view-composer NomeDoComposer

REPOSITORY INTERFACE
php artisan make:repository-interface NomeDoRepositoryInterface

REPOSITORY
php artisan make:repository NomeDoRepository

BINDINGS DA REPOSITORY(InjectionServiceProvider.php)
php artisan make:repository-bindings NomeDoEntity

REPOSITORY + INTERFACE + BINDING
php artisan make:entity NomeDoEntity

MODEL INTERFACE
php artisan make:model-interface NomeDaModelInterface

MODEL
php artisan make:model-eloquent NomeDaModel NomeDaTabela -i
obs(-i para criar a interface junto)

VIEW 
View Crud: php artisan make:view-crud nomeDaPasta
View Index: php artisan make:view-index nomeDaPasta NomeDaRota(opcional)
View Create: php artisan make:view-create nomeDaPasta NomeDaRota(opcional)
View Edit: php artisan make:view-edit nomeDaPasta NomeDaRota(opcional)
View Form: php artisan make:view-form nomeDaPasta
View Default: php artisan make:view nomeDaView
