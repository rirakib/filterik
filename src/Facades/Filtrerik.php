<?php

namespace Filterik\Facades;

use Illuminate\Support\Facades\Facade;

class Filterik extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filterik';
    }
}
