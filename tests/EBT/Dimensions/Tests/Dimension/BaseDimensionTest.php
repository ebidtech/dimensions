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
use EBT\Dimensions\Dimension\BaseDimension;

class BaseDimensionTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testConstructor(BaseDimension $baseDimension, $expectedValue, $expectedToString)
    {
        $this->assertEquals($expectedToString, $baseDimension->__toString());
        $this->assertEquals($expectedValue, $baseDimension->getValue());
        $this->assertEquals(get_class($baseDimension), $baseDimension->getKey());
        $this->assertEquals('BaseDimension', BaseDimension::getSerializableKey());
    }

    public function provider()
    {
        return array(
            array(
                $this->getMockForAbstractClass('\EBT\Dimensions\Dimension\BaseDimension'),
                null,
                BaseDimension::NULL_STR_REPRESENTATION,
            ),
        );
    }
}
