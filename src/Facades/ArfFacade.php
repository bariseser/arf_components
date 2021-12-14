<?php

namespace ArfLabsOu\Components\Facades;

use Illuminate\Support\Facades\Facade;

class ArfFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'arf_helper';
    }
}