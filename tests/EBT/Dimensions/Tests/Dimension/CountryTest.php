<?php

/*
 * This file is a part of the Dimensions library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Dimensions\Tests\Dimension;

use EBT\Dimensions\Dimension\Country;

class CountryTest extends TestCase
{
    public function testJsonSerialize()
    {
        $originalArray = array(Country::SERIALIZABLE_KEY => Country::B2B);
        $originalJson = json_encode($originalArray);
        $businessType = new Country(Country::B2B);
        $this->assertEquals($originalJson, json_encode($businessType));
    }
}
