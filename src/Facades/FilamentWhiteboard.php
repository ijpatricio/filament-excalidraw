<?php

namespace Ijpatricio\FilamentExcalidraw\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ijpatricio\FilamentExcalidraw\FilamentExcalidraw
 */
class FilamentExcalidraw extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ijpatricio\FilamentExcalidraw\FilamentExcalidraw::class;
    }
}
