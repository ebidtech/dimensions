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
    public function testJsonSerialize()
    {
        $originalArray = array(BusinessType::getSerializableKey() => BusinessType::B2B);
        $originalJson = json_encode($originalArray);
        $businessType = new BusinessType(BusinessType::B2B);
        $this->assertEquals($originalJson, json_encode($businessType));
    }

    /**
     * @dataProvider provider
     */
    public function testConstruction(BusinessType $businessType, $expectedIsDefined, $expectedToString)
    {
        $this->assertEquals($expectedToString, $businessType->__toString());
        $this->assertEquals($expectedIsDefined, $businessType->isDefined());
        $this->assertEquals(BusinessType::getSerializableKey(), $businessType->getKey());
    }

    public function provider()
    {
        return array(
            array(new BusinessType(), false, BusinessType::NULL_STR_REPRESENTATION),
            array(new BusinessType(BusinessType::B2B), true, BusinessType::B2B),
            array(new BusinessType(BusinessType::B2C), true, BusinessType::B2C)
        );
    }
}
