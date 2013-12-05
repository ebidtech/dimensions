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

interface DimensionInterface extends \JsonSerializable
{
    public function __toString();

    public function isDefined();

    public function getValue();

    public function getKey();

    /**
     * Should return an array of valid values to be validated in the constructor
     * Returning false disables this validation in the constructor
     *
     * @return string
     */
    public static function getSerializableKey();


    public static function fromArray(array $data);
}
