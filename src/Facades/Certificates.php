<?php

namespace Apsg\Certificate\Facades;

use Illuminate\Support\Facades\Facade;

class Certificates extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'certificates';
    }
}
