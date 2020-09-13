<?php

namespace Tematech\Avstelecomsms;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tematech\Avstelecomsms\Skeleton\SkeletonClass
 */
class AvstelecomsmsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Avstelecomsms::class;
    }
}
