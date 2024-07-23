<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class EsriFacade extends Facade
{

    /**
     * FACADE ACCESSOR
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'esri';
    }

}