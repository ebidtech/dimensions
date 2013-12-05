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

use EBT\Dimensions\Dimension\Scope;

class ScopeTest extends TestCase
{
    public function testJsonSerialize()
    {
        $originalArray = array(Scope::SERIALIZABLE_KEY => Scope::B2B);
        $originalJson = json_encode($originalArray);
        $businessType = new Scope(Scope::B2B);
        $this->assertEquals($originalJson, json_encode($businessType));
    }
}
