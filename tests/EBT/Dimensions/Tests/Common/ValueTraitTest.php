<?php

/*
 * This file is a part of the Dimensions library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Dimensions\Tests\Common;

use EBT\Dimensions\Common\ToStringTrait;
use EBT\Dimensions\Tests\TestCase;
use EBT\Dimensions\Common\ValueTrait;

/**
 * ValueTraitTest
 */
class ValueTraitTest extends TestCase
{
    use ValueTrait;
    use ToStringTrait;

    /**
     * @expectedException \EBT\Dimensions\Exception\InvalidArgumentException
     */
    public function testSetEnum()
    {
        $this->setEnum('test');
    }
}
