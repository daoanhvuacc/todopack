<?php

namespace EricDao\TodoPack\Facades;

use Illuminate\Support\Facades\Facade;

class TodoPack extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'todopack';
    }
}
