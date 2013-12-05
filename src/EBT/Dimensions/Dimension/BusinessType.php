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

class BusinessType extends BaseDimension
{
    const B2B = 'b2b';
    const B2C = 'b2c';

    protected static $serializable_key = 'biz_type';

    /**
     * @inheritdoc
     */
    protected function getAllPossibleValues()
    {
        return array(static::B2B, static::B2C);
    }

    /**
     * @return bool
     */
    public function isB2b()
    {
        return ($this->getValue() == static::B2B);
    }

    /**
     * @return bool
     */
    public function isB2c()
    {
        return ($this->getValue() == static::B2C);
    }

    /**
     * @return static
     */
    public static function b2b()
    {
        return new static(static::B2B);
    }

    /**
     * @return static
     */
    public static function b2c()
    {
        return new static(static::B2C);
    }
}
