<?php

/**
 * This file is a part of the Dimensions library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Dimensions\Dimension;

use EBT\Dimensions\Exception\InvalidArgumentException;
use EBT\Dimensions\Common\KeyTrait;
use EBT\Dimensions\Common\ValueTrait;

/**
 * Scope, represents the scope publisher or global.
 */
class Scope implements DimensionInterface
{
    use KeyTrait;
    use ValueTrait;

    const PUBLISHER_SCOPE = 'pub';
    const GLOBAL_SCOPE = 'glo';
    const KEY = 'scope';

    /**
     * @param string|null $scope
     *
     * @throws InvalidArgumentException
     */
    public function __construct($scope = null)
    {
        $this->setEnum($scope);
    }

    /**
     * @inheritdoc
     */
    public static function getPossibleValues()
    {
        return array(static::PUBLISHER_SCOPE, static::GLOBAL_SCOPE);
    }

    /**
     * @return bool
     */
    public function isPublisher()
    {
        return $this->getValue() == static::PUBLISHER_SCOPE;
    }

    /**
     * @return bool
     */
    public function isGlobal()
    {
        return $this->getValue() == static::GLOBAL_SCOPE;
    }

    /**
     * @return Scope
     */
    public static function publisher()
    {
        return new static(static::PUBLISHER_SCOPE);
    }

    /**
     * @return Scope
     */
    public static function gglobal()
    {
        return new static(static::GLOBAL_SCOPE);
    }
}
