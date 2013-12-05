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

use EBT\Dimensions\Exception\InvalidDimensionArgumentException;

abstract class BaseDimension implements DimensionInterface
{
    const NULL_STR_REPRESENTATION = 'NA';

    /**
     * @var string Must be defined if you want to use it in getSerializableKey()
     */
    protected static $serializable_key;

    /**
     * @var string
     */
    protected $value;

    /**
     * @inheritdoc
     */
    abstract protected function getAllPossibleValues();

    public function __construct($value = null)
    {
        if (is_null($value) || static::NULL_STR_REPRESENTATION == $value) {
            $this->value = null;
            return;
        }

        if ($this->getAllPossibleValues()) {
            if (!in_array($value, $this->getAllPossibleValues())) {
                throw new InvalidDimensionArgumentException(
                    sprintf('Expected a value in (%s), % given.', implode(',', $this->getAllPossibleValues()), $value)
                );
            }
        }
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        if (is_null($this->value)) {
            return static::NULL_STR_REPRESENTATION;
        }
        return $this->value;
    }

    /**
     * @inheritdoc
     */
    public function isDefined()
    {
        return !is_null($this->value);
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
    public function getKey()
    {
        return static::getSerializableKey();
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return array($this->getSerializableKey() => $this->getValue());
    }

    /**
     * @inheritdoc
     */
    public static function getSerializableKey()
    {
        if (isset(static::$serializable_key)) {
            return static::$serializable_key;
        }
        $reflection = new \ReflectionClass(get_called_class());
        return $reflection->getShortName();
    }

    /**
     * @param array $data
     *
     * @return static
     * @throws InvalidArgumentException
     */
    public static function fromArray(array $data)
    {
        if (count($data) != 1) {
            throw new InvalidArgumentException(
                sprintf('Expected an array with 1 entry, % given.', count($data))
            );
        }
        if (!isset($data[static::getSerializableKey()])) {
            throw new InvalidArgumentException(
                sprintf('Expected key %s, % given.', static::getSerializableKey(), array_keys($data)[0])
            );
        }
        return new static($data[static::getSerializableKey()]);
    }
}
