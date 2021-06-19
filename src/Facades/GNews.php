<?php

namespace ErgonautTM\GNewsApi\Facades;

use Illuminate\Support\Facades\Facade;

class GNews extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'gnews';
    }
}
