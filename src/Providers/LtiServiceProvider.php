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
        $this->app->bind('lti', LtiService::class);
    }

    /**
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('/migrations'),
        ],'migrations');

        $this->commands([
            \RobertBoes\LaravelLti\Commands\CreateToolConsumerCommand::class
        ]);
    }
}
