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

use EBT\Dimensions\Tests\TestCase;
use EBT\Dimensions\Common\ValidatorTrait;

/**
 * ValidatorTraitTest
 */
class ValidatorTraitTest extends TestCase
{
    use ValidatorTrait;

    /**
     * @expectedException \EBT\Dimensions\Exception\InvalidDimensionArgumentException
     */
    public function testNotInteger()
    {
        $this->positiveIntegerOrException(new \stdClass());
    }

    /**
     * @expectedException \EBT\Dimensions\Exception\InvalidDimensionArgumentException
     */
    public function testNegative()
    {
        $this->positiveIntegerOrException(-10);
    }
}
