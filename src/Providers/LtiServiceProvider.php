<?php

namespace RobertBoes\LaravelLti\Providers;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use RobertBoes\LaravelLti\Services\LtiService;

class LtiServiceProvider extends IlluminateServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->app->bind('lti', LtiService::class);

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    public function register()
    {
        $this->commands([
            \RobertBoes\LaravelLti\Commands\CreateToolConsumerCommand::class
        ]);

        // Register the service the package provides.
        $this->app->singleton('laravel-lti', function ($app) {
            return new LtiService;
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
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('lti.php'),
        ], 'laravel-lti.config');

        $this->publishes([
            __DIR__.'/../../database/migrations/' => database_path('migrations'),
        ], 'migrations');
    }
}
