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
        $possible = static::getPossibleValues();
        if ($value !== null && !in_array($value, $possible)) {
            throw new InvalidArgumentException(sprintf('Expected one of "%s"', json_encode($possible)));
        }

        $this->value = $value;
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

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->value === null ? static::getNullStrRepresentation() : (string) $this->value;
    }

    /**
     * @return string
     */
    public static function getNullStrRepresentation()
    {
        return 'NA';
    }
}