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

    protected static $serializable_key = 'country';

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

        if (is_null($value) || static::NULL_STR_REPRESENTATION == $value) {
            return;
        }

        $this->validatePositiveIntegerOrException($value);

        $this->value = $value;
    }

    public function getCountryId()
    {
        return $this->getValue();
    }

    public static function country($countryID = null)
    {
        return new static($countryID);
    }
}
