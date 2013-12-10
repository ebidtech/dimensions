<?php

/**
 * This file is a part of the Dimensions library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Dimensions\Common;

/**
 * ToStringTrait
 */
trait ToStringTrait
{
    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->getValue() === null ? static::getNullStrRepresentation() : (string) $this->value;
    }

    /**
     * @return string
     */
    final public static function getNullStrRepresentation()
    {
        return 'none';
    }

    /**
     * @inheritdoc
     */
    abstract public function getValue();
}
