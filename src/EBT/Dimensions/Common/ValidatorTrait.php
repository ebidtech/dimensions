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

use EBT\Dimensions\Exception\InvalidArgumentException;

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
     * @throws InvalidArgumentException
     */
    protected function positiveIntegerOrException($value)
    {
        if (!is_integer($value)) {
            throw new InvalidArgumentException(
                sprintf('Expected integer, "%s" given.', gettype($value))
            );
        }

        if ($value < 1) {
            throw new InvalidArgumentException(
                sprintf('Expected positive integer, "%d" given.', $value)
            );
        }
    }

    /**
     * Throws exception if values is not in the possible values
     *
     * @param mixed $value
     * @param array $possibleValues
     *
     * @throws InvalidArgumentException
     */
    protected function possibleValuesOrException($value, array $possibleValues)
    {
        if (!in_array($value, $possibleValues)) {
            throw new InvalidArgumentException(
                sprintf('Expected one of "%s"', json_encode($possibleValues))
            );
        }
    }
}
