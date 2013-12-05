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

use EBT\Dimensions\TTrait\NumericValidatorTrait;

class Publisher extends BaseDimension
{
    use NumericValidatorTrait;

    const SERIALIZABLE_KEY = 'pub';

    /**
     * @inheritdoc
     */
    protected function getAllPossibleValues()
    {
        return false;
    }

    public function __construct($value)
    {
        parent::__construct($value);

        $this->validatePositiveIntegerOrException($value);

        $this->value = $value;
    }

    public function getPublisherId()
    {
        return $this->getValue();
    }

    public static function PublisherBuilder($publisherID)
    {
        return new static($publisherID);
    }

    /**
     * @inheritdoc
     */
    public static function getSerializableKey()
    {
        return static::SERIALIZABLE_KEY;
    }
}
