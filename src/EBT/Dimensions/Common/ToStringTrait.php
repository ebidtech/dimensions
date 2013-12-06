<?php

/**
 * LICENSE: [EMAILBIDDING_DESCRIPTION_LICENSE_HERE]
 *
 * @author     Eduardo Oliveira <eduardo.oliveira@emailbidding.com>
 * @copyright  2012-2013 Emailbidding
 * @license    [EMAILBIDDING_URL_LICENSE_HERE]
 */

namespace EBT\Dimensions\Common;

/**
 * ToStringTrait
 */
trait ToStringTrait
{
    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->getValue() === null ? static::getNullStrRepresentation() : (string) $this->value;
    }

    /**
     * @return string
     */
    final public static function getNullStrRepresentation()
    {
        return 'NA';
    }

    /**
     * @inheritdoc
     */
    abstract public function getValue();
}
