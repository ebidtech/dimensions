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
use EBT\Dimensions\Dimension\Country;
use EBT\Dimensions\Dimension\Publisher;
use EBT\Dimensions\Dimension\Scope;
use EBT\Dimensions\DimensionGroup;

class DimensionGroupTest extends TestCase
{

    /**
     * @param BusinessType $originBusinessType
     * @param Scope        $originScope
     * @param Country      $originCountry
     * @param Publisher    $originPublisher
     *
     * @dataProvider providerDimensions
     */
    public function testConstruct(
        BusinessType $originBusinessType,
        Scope $originScope,
        Country $originCountry,
        Publisher $originPublisher
    ) {
        $dimensionGroup = new DimensionGroup($originBusinessType, $originScope, $originCountry, $originPublisher);

        $this->assertCount(4, $dimensionGroup);

        $this->assertEquals($originBusinessType, $dimensionGroup->getBusinessType());
        $this->assertEquals($originScope, $dimensionGroup->getScope());
        $this->assertEquals($originCountry, $dimensionGroup->getCountry());
        $this->assertEquals($originPublisher, $dimensionGroup->getPublisher());
    }

    /**
     * @expectedException \EBT\Dimensions\Exception\InvalidArgumentException
     */
    public function testFromArrayMissingKeys()
    {
        DimensionGroup::fromArray(array());
    }

    /**
     * @param BusinessType $originBusinessType
     * @param Scope        $originScope
     * @param Country      $originCountry
     * @param Publisher    $originPublisher
     *
     * @dataProvider providerDimensions
     */
    public function testToFromArray(
        BusinessType $originBusinessType,
        Scope $originScope,
        Country $originCountry,
        Publisher $originPublisher
    ) {
        $dimensionGroup = new DimensionGroup($originBusinessType, $originScope, $originCountry, $originPublisher);
        $this->assertEquals($dimensionGroup, DimensionGroup::fromArray($dimensionGroup->toArray()));
    }

    public function providerDimensions()
    {
        return array(
            array(BusinessType::b2b(), Scope::gglobal(), Country::none(), Publisher::none()),
            array(BusinessType::b2c(), Scope::publisher(), Country::create(1), Publisher::create(2))
        );
    }
}
