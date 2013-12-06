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

use EBT\Dimensions\Exception\InvalidArgumentException;
use EBT\Dimensions\Common\KeyTrait;
use EBT\Dimensions\Common\ValueTrait;
use EBT\Dimensions\Common\ToStringTrait;

class BusinessType implements DimensionInterface
{
    use KeyTrait;
    use ValueTrait;
    use ToStringTrait;

    const B2B = 'b2b';
    const B2C = 'b2c';

    /**
     * @param string|null $businessType
     *
     * @throws InvalidArgumentException
     */
    public function __construct($businessType = null)
    {
        $this->setEnum($businessType);
    }

    /**
     * @inheritdoc
     */
    public static function getPossibleValues()
    {
        return array(static::B2B, static::B2C);
    }

    /**
     * @inheritdoc
     */
    public function getKey()
    {
        return 'business_type';
    }

    /**
     * @return bool
     */
    public function isB2b()
    {
        return $this->getValue() == static::B2B;
    }

    /**
     * @return bool
     */
    public function isB2c()
    {
        return $this->getValue() == static::B2C;
    }

    /**
     * @return BusinessType
     */
    public static function b2b()
    {
        return new static(static::B2B);
    }

    /**
     * @return BusinessType
     */
    public static function b2c()
    {
        return new static(static::B2C);
    }

    /**
     * @return BusinessType
     */
    public static function none()
    {
        return new static();
    }
}
