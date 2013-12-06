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
    public function testGetKey()
    {
        $this->assertEquals('country', Country::none()->getKey());
    }

    public function testConstruct()
    {
        $countryId = 10;
        $this->assertEquals($countryId, (new Country($countryId))->getId());
    }

    public function testBuilders()
    {
        $countryId = 10;
        $country = Country::create($countryId);
        $this->assertEquals($countryId, $country->getId());

        $this->assertFalse(Country::none()->isDefined());
    }

    /**
     * @dataProvider provider
     */
    public function testConstruction(Country $country, $expectedIsDefined, $expectedToString)
    {
        $this->assertEquals($expectedToString, $country->__toString());
        $this->assertEquals($expectedIsDefined, $country->isDefined());
        $this->assertEquals(Country::none()->getKey(), $country->getKey());
    }

    public function provider()
    {
        return array(
            array(new Country(), false, Country::getNullStrRepresentation()),
            array(new Country(1), true, 1),
            array(new Country(2), true, 2)
        );
    }
}
