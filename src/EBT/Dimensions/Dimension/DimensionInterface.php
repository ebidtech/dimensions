<?php

/**
 * This file is a part of the Dimensions library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Dimensions\Dimension;

interface DimensionInterface
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @return bool True in case dimension is defined
     */
    public function isDefined();

    /**
     * @return mixed The value itself
     */
    public function getValue();

    /**
     * @return string The key
     */
    public static function getKey();

    /**
     * @return string
     */
    public static function getNullStrRepresentation();
}
