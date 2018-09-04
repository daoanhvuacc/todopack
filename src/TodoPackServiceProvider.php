<?php

namespace EricDao\TodoPack;

use Illuminate\Support\ServiceProvider;

class TodoPackServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'ericdao');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'ericdao');
         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/todopack.php' => config_path('todopack.php'),
            ], 'todopack.config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/ericdao/todopack'),
            ], 'todopack.views');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/ericdao'),
            ], 'todopack.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/ericdao'),
            ], 'todopack.views');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/todopack.php', 'todopack');

        // Register the service the package provides.
        $this->app->singleton('todopack', function ($app) {
            return new TodoPack;
        });
        $this->app->make('EricDao\TodoPack\Http\Controllers\TaskController');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['todopack'];
    }
}