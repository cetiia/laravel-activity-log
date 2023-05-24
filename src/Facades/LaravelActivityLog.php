<?php

namespace Cetiia\LaravelActivityLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Cetiia\LaravelActivityLog\LaravelActivityLog
 */
class LaravelActivityLog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Cetiia\LaravelActivityLog\LaravelActivityLog::class;
    }
}
