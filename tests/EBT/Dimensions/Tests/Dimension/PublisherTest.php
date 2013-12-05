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
use EBT\Dimensions\Dimension\Publisher;

class PublisherTest extends TestCase
{
    public function testJsonSerialize()
    {
        $publisherId = 10;

        $originalArray = array(Publisher::getSerializableKey() => $publisherId);
        $originalJson = json_encode($originalArray);
        $businessType = new Publisher($publisherId);
        $this->assertEquals($originalJson, json_encode($businessType));
    }

    /**
     * @dataProvider provider
     */
    public function testConstruction(Publisher $publisher, $expectedIsDefined, $expectedToString)
    {
        $this->assertEquals($expectedToString, $publisher->__toString());
        $this->assertEquals($expectedIsDefined, $publisher->isDefined());
        $this->assertEquals(Publisher::getSerializableKey(), $publisher->getKey());
    }

    public function provider()
    {
        return array(
            array(new Publisher(), false, Publisher::NULL_STR_REPRESENTATION),
            array(new Publisher(1), true, 1),
            array(new Publisher(2), true, 2)
        );
    }
}
