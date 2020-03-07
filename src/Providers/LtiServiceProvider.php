<?php

namespace RobertBoes\LaravelLti\Providers;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use RobertBoes\LaravelLti\Services\LtiService;

/**
 */
class LtiServiceProvider extends IlluminateServiceProvider
{
    protected $defer = false;

    /**
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'arietissoftware');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'arietissoftware');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->app->bind('lti', LtiService::class);

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     */
    public function register()
    {
        //$this->commands([
            //\RobertBoes\LaravelLti\Commands\CreateToolConsumerCommand::class
        //]);

        // Register the service the package provides.
        $this->app->singleton('laravel-lti', function ($app) {
            return new laravel-lti;
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-lti'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        //$this->publishes([
            //__DIR__.'/../config/package-example.php' => config_path('package-example.php'),
        //], 'package-example.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/arietissoftware'),
        ], 'package-example.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/arietissoftware'),
        ], 'package-example.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/arietissoftware'),
        ], 'package-example.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
