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
use EBT\Dimensions\Dimension\BusinessType;

class BusinessTypeTest extends TestCase
{
    public function testGetKey()
    {
        $this->assertEquals('business_type', BusinessType::none()->getKey());
    }

    public function testBuilders()
    {
        $this->assertTrue(BusinessType::b2b()->isB2b());
        $this->assertTrue(BusinessType::b2c()->isB2c());
    }

    /**
     * @dataProvider provider
     */
    public function testConstruction(BusinessType $businessType, $expectedIsDefined, $expectedToString)
    {
        $this->assertEquals($expectedToString, $businessType->__toString());
        $this->assertEquals($expectedIsDefined, $businessType->isDefined());
    }

    public function provider()
    {
        return array(
            array(new BusinessType(), false, BusinessType::getNullStrRepresentation()),
            array(new BusinessType(BusinessType::B2B), true, BusinessType::B2B),
            array(new BusinessType(BusinessType::B2C), true, BusinessType::B2C)
        );
    }
}
