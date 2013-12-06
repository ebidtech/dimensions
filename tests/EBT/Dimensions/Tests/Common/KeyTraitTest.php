<?php

/**
 * LICENSE: [EMAILBIDDING_DESCRIPTION_LICENSE_HERE]
 *
 * @author     Eduardo Oliveira <eduardo.oliveira@emailbidding.com>
 * @copyright  2012-2013 Emailbidding
 * @license    [EMAILBIDDING_URL_LICENSE_HERE]
 */

namespace EBT\Dimensions\Tests\Common;

use EBT\Dimensions\Tests\TestCase;
use EBT\Dimensions\Common\KeyTrait;

/**
 * KeyTraitTest
 */
class KeyTraitTest extends TestCase
{
    use KeyTrait;

    public function testGetKey()
    {
        $this->assertEquals('keytraittest', $this->getKey());
    }
}
