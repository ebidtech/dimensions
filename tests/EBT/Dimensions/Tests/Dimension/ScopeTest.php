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

use EBT\Dimensions\Dimension\BaseDimension;
use EBT\Dimensions\Tests\TestCase;
use EBT\Dimensions\Dimension\Scope;

class ScopeTest extends TestCase
{
    public function testGetKey()
    {
        $this->assertEquals('scope', Scope::none()->getKey());
    }

    public function testBuilders()
    {
        $this->assertTrue(Scope::publisher()->isPublisher());
        $this->assertTrue(Scope::gglobal()->isGlobal());
    }

    /**
     * @dataProvider provider
     */
    public function testConstruction(Scope $scope, $expectedIsDefined, $expectedToString)
    {
        $this->assertEquals($expectedToString, $scope->__toString());
        $this->assertEquals($expectedIsDefined, $scope->isDefined());
        $this->assertEquals(Scope::none()->getKey(), $scope->getKey());
    }

    public function provider()
    {
        return array(
            array(new Scope(), false, Scope::getNullStrRepresentation()),
            array(new Scope(Scope::GLOBAL_SCOPE), true, Scope::GLOBAL_SCOPE),
            array(new Scope(Scope::PUBLISHER_SCOPE), true, Scope::PUBLISHER_SCOPE)
        );
    }
}
