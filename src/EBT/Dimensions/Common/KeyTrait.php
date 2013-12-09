<?php

/*
 * This file is a part of the Dimensions library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Dimensions\Common;

/**
 * KeyTrait
 */
trait KeyTrait
{
    public function getKey()
    {
        $refClass = new \ReflectionClass($this);
        return strtolower($refClass->getShortName());
    }
}
