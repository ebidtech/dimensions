<?php

/*
 * This file is a part of the Dimensions library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Dimensions\Tests;

use EBT\Dimensions\Dummy;

/**
 * DummyTest
 */
class DummyTest extends TestCase
{
    /**
     * delete me later
     */
    public function testDummy()
    {
        $this->assertEquals(5, (new Dummy())->get());
    }
}
