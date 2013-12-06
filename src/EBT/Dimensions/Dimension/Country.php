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

class Country implements DimensionInterface
{
    use KeyTrait;
    use ValueTrait;

    const KEY = 'country';

    /**
     * @param int|null $countryId
     */
    public function __construct($countryId = null)
    {
        $this->setPositiveInteger($countryId);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getValue();
    }

    /**
     * @param int|null $countryId
     *
     * @return Country
     */
    public static function create($countryId = null)
    {
        return new static($countryId);
    }

    /**
     * @return Country
     */
    public static function none()
    {
        return static::create();
    }
}
