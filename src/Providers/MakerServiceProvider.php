<?php

namespace Shlok\Maker\Providers;

use Shlok\Maker\Commands\MakeModel;
use Shlok\Maker\Commands\MakeRepository;
use Illuminate\Support\ServiceProvider;

class MakerServiceProvider extends ServiceProvider
{
    /**
     * Ragister package path name here.
     * @param string
     */
    private const PATH_VIEWS = __DIR__.'/../../resources/views';
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->registerNewModelCommand();
        $this->registerNewRepositoryCommand();
    }

    public function boot()
    {
        $this->loadViewsFrom(self::PATH_VIEWS, 'shlok.maker');
    }

    protected function registerNewModelCommand(): void
    {
        $this->app->bind('command.make:model', MakeModel::class);
        $this->commands(['command.make:model']);
    }

    protected function registerNewRepositoryCommand(): void
    {
        $this->app->bind('command.make:repository', MakeRepository::class);
        $this->commands(['command.make:repository']);
    }
}
