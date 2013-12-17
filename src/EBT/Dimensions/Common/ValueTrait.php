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

use EBT\Dimensions\Exception\InvalidArgumentException;

/**
 * ValueTrait
 */
trait ValueTrait
{
    use ValidatorTrait;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param mixed $value
     */
    protected function setPositiveInteger($value)
    {
        if (!is_null($value) && static::getNullStrRepresentation() !== $value) {
            $this->positiveIntegerOrException($value);
            $this->value = $value;
        }
    }

    /**
     * @param string $value
     *
     * @throws InvalidArgumentException
     */
    protected function setEnum($value)
    {
        if (!is_null($value) && static::getNullStrRepresentation() !== $value) {
            $this->possibleValuesOrException($value, static::getPossibleValues());
            $this->value = $value;
        }
    }

    /**
     * array
     */
    public static function getPossibleValues()
    {
        // override me
        return array();
    }

    /**
     * @inheritdoc
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @inheritdoc
     */
    public function isDefined()
    {
        return $this->value !== null;
    }
}
