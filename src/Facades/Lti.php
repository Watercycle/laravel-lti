<?php

namespace RobertBoes\LaravelLti\Facades;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

/**
 */
class Lti extends IlluminateFacade
{
    /**
     * Return facade accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lti';
    }
}
