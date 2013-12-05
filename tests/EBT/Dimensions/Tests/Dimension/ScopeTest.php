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
    public function testJsonSerialize()
    {
        $originalArray = array(Scope::getSerializableKey() => Scope::GLOBALSCOPE);
        $originalJson = json_encode($originalArray);
        $businessType = new Scope(Scope::GLOBALSCOPE);
        $this->assertEquals($originalJson, json_encode($businessType));
    }

    /**
     * @dataProvider provider
     */
    public function testConstruction(Scope $scope, $expectedIsDefined, $expectedToString)
    {
        $this->assertEquals($expectedToString, $scope->__toString());
        $this->assertEquals($expectedIsDefined, $scope->isDefined());
        $this->assertEquals(Scope::getSerializableKey(), $scope->getKey());
    }

    public function provider()
    {
        return array(
            array(new Scope(), false, Scope::NULL_STR_REPRESENTATION),
            array(new Scope(Scope::GLOBALSCOPE), true, Scope::GLOBALSCOPE),
            array(new Scope(Scope::PUBLISHER), true, Scope::PUBLISHER)
        );
    }
}
