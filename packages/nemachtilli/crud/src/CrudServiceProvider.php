<?php

namespace Nemachtilli\Crud;

use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom( __DIR__ . '/routes.php');
        $this->loadMigrationsFrom( __DIR__ . '/migrations');
        $this->loadViewsFrom( __DIR__ . '/views', 'nemachtilli-crud');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('Nemachtilli\Crud\Http\Controllers\TaskController');
    }
}
