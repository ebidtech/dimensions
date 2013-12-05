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

use EBT\Dimensions\Tests\TestCase;
use EBT\Dimensions\Dimension\Country;

class CountryTest extends TestCase
{
    public function testJsonSerialize()
    {
        $countryId = 1;
        $originalArray = array(Country::getSerializableKey() => $countryId);
        $originalJson = json_encode($originalArray);
        $businessType = new Country($countryId);
        $this->assertEquals($originalJson, json_encode($businessType));
    }

    /**
     * @dataProvider provider
     */
    public function testConstruction(Country $country, $expectedIsDefined, $expectedToString)
    {
        $this->assertEquals($expectedToString, $country->__toString());
        $this->assertEquals($expectedIsDefined, $country->isDefined());
        $this->assertEquals(Country::getSerializableKey(), $country->getKey());
    }

    public function provider()
    {
        return array(
            array(new Country(), false, Country::NULL_STR_REPRESENTATION),
            array(new Country(1), true, 1),
            array(new Country(2), true, 2)
        );
    }
}
