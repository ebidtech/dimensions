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

class Country extends BaseDimension
{
    use NumericValidatorTrait;

    const SERIALIZABLE_KEY = 'country';

    /**
     * @inheritdoc
     */
    protected function getAllPossibleValues()
    {
        /* returning false disables this validation in the constructor */
        return false;
    }

    public function __construct($value = null)
    {
        parent::__construct($value);

        $this->validatePositiveIntegerOrException($value);

        $this->value = $value;
    }

    public function getCountryId()
    {
        return $this->getValue();
    }

    public static function countryBuilder($countryID)
    {
        return new static($countryID);
    }

    /**
     * @inheritdoc
     */
    public static function getSerializableKey()
    {
        return static::SERIALIZABLE_KEY;
    }
}
