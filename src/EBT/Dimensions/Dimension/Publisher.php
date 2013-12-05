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

    protected static $serializable_key = 'pub';

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

        if (is_null($value) || static::NULL_STR_REPRESENTATION == $value) {
            return;
        }

        $this->validatePositiveIntegerOrException($value);

        $this->value = $value;
    }

    public function getPublisherId()
    {
        return $this->getValue();
    }

    public static function publisher($publisherID = null)
    {
        return new static($publisherID);
    }
}
