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
    public function testGetKey()
    {
        $this->assertEquals('publisher', Publisher::none()->getKey());
    }

    public function testBuilders()
    {
        $publisherId = 20;
        $publisher = Publisher::create($publisherId);
        $this->assertEquals($publisherId, $publisher->getId());

        $this->assertFalse(Publisher::none()->isDefined());
    }

    /**
     * @dataProvider provider
     */
    public function testConstruction(Publisher $publisher, $expectedIsDefined, $expectedToString)
    {
        $this->assertEquals($expectedToString, $publisher->__toString());
        $this->assertEquals($expectedIsDefined, $publisher->isDefined());
        $this->assertEquals(Publisher::create()->getKey(), $publisher->getKey());
    }

    public function provider()
    {
        return array(
            array(new Publisher(), false, Publisher::getNullStrRepresentation()),
            array(new Publisher(1), true, 1),
            array(new Publisher(2), true, 2)
        );
    }
}
