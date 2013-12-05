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

class Scope extends BaseDimension
{
    const PUBLISHER = 'pub';
    const GLOBALSCOPE = 'glo';

    protected static $serializable_key = 'scope';

    /**
     * @inheritdoc
     */
    protected function getAllPossibleValues()
    {
        return array(static::PUBLISHER, static::GLOBALSCOPE);
    }

    /**
     * @return bool
     */
    public function isPublisher()
    {
        return ($this->getValue() == static::PUBLISHER);
    }

    /**
     * @return bool
     */
    public function isGlobal()
    {
        return ($this->getValue() == static::GLOBALSCOPE);
    }

    /**
     * @return static
     */
    public static function publisher()
    {
        return new static(static::PUBLISHER);
    }

    /**
     * @return static
     */
    public static function gglobal()
    {
        return new static(static::GLOBALSCOPE);
    }
}
