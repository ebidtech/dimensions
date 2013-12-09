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

use EBT\Dimensions\Common\ValidatorTrait;
use EBT\Dimensions\Common\KeyTrait;
use EBT\Dimensions\Common\ValueTrait;
use EBT\Dimensions\Common\ToStringTrait;

class Publisher implements DimensionInterface
{
    use KeyTrait;
    use ValueTrait;
    use ToStringTrait;

    const KEY = 'pub';

    /**
     * @param int|null $value
     */
    public function __construct($value = null)
    {
        $this->setPositiveInteger($value);
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->getValue();
    }

    /**
     * @param int|null $publisherId
     *
     * @return Publisher
     */
    public static function create($publisherId = null)
    {
        return new static($publisherId);
    }

    /**
     * @return Publisher
     */
    public static function none()
    {
        return static::create();
    }
}
