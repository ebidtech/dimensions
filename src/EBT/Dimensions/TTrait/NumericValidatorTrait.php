<?php

/**
 * This file is a part of the Dimensions library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Dimensions\TTrait;

use EBT\Dimensions\Exception\InvalidDimensionArgumentException;

/**
 * NumericValidatorTrait
 */
trait NumericValidatorTrait
{
    /**
     * validates argument as Positive Integer
     *
     */
    public function validatePositiveIntegerOrException($value)
    {
        if (!is_integer($value)) {
            throw new InvalidDimensionArgumentException(
                sprintf('Expected integer, % given.', gettype($value))
            );
        }

        if ($value < 1) {
            throw new InvalidDimensionArgumentException(
                sprintf('Expected positive integer, % given.', $value)
            );
        }
        return true;
    }
}
