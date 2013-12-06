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

use EBT\Dimensions\Exception\InvalidDimensionArgumentException;

/**
 * ValidatorTrait
 */
trait ValidatorTrait
{
    /**
     * Throws exception if values is not an positive integer
     *
     * @param mixed $value
     *
     * @throws InvalidDimensionArgumentException
     */
    protected function positiveIntegerOrException($value)
    {
        if (!is_integer($value)) {
            throw new InvalidDimensionArgumentException(
                sprintf('Expected integer, "%s" given.', gettype($value))
            );
        }

        if ($value < 1) {
            throw new InvalidDimensionArgumentException(
                sprintf('Expected positive integer, "%d" given.', $value)
            );
        }
    }
}
