<?php

/**
 * This file is a part of the Dimensions library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\Dimensions;

use EBT\Dimensions\Dimension\DimensionInterface;
use EBT\Dimensions\Dimension\BusinessType;
use EBT\Dimensions\Dimension\Country;
use EBT\Dimensions\Dimension\Publisher;
use EBT\Dimensions\Dimension\Scope;
use EBT\Collection\IterableTrait;
use EBT\Collection\CountableTrait;
use EBT\Collection\EmptyTrait;
use EBT\Collection\DirectAccessTrait;
use EBT\Collection\GetCollectionTrait;
use EBT\Collection\CollectionDirectAccessInterface;
use EBT\Dimensions\Exception\InvalidArgumentException;

class DimensionGroup implements CollectionDirectAccessInterface
{
    use IterableTrait;
    use CountableTrait;
    use EmptyTrait;
    use DirectAccessTrait {
        get as protected getInternal;
        getOrException as protected getOrExceptionInternal;
    }
    use GetCollectionTrait;

    /**
     * @var DimensionInterface[]
     */
    protected $collection = array();

    public function __construct(BusinessType $businessType, Scope $scope, Country $country, Publisher $publisher)
    {
        $this->add($businessType);
        $this->add($scope);
        $this->add($country);
        $this->add($publisher);
    }

    /**
     * @param DimensionInterface $dimension
     *
     * @throws InvalidArgumentException In case a subtopic with same name is already present
     */
    protected function add(DimensionInterface $dimension)
    {
        $this->collection[$dimension->getKey()] = $dimension;
    }

    /**
     * @return BusinessType
     */
    public function getBusinessType()
    {
        return $this->getOrExceptionInternal(BusinessType::none()->getKey());
    }

    /**
     * @return Scope
     */
    public function getScope()
    {
        return $this->getOrExceptionInternal(Scope::none()->getKey());
    }

    /**
     * @return Country
     */
    public function getCountry()
    {
        return $this->getOrExceptionInternal(Country::none()->getKey());
    }

    /**
     * @return Publisher
     */
    public function getPublisher()
    {
        return $this->getOrExceptionInternal(Publisher::none()->getKey());
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $dimensions = array();

        /** @var DimensionInterface $dimension */
        foreach ($this as $dimension) {
            // this looks like voodoo, if the value is defined you want to keep the value without casting it to string,
            // eg you want to keep country as integer, when is not defined you want the string representation of null
            $dimensions[$dimension->getKey()] = $dimension->isDefined()
                ? $dimension->getValue()
                : $dimension::getNullStrRepresentation();
        }

        return $dimensions;
    }

    /**
     * @param array $data array(
     *                        'dimension_key_1' => 'value',
     *                        'dimension_key_2' => 'value'
     *                    )
     *
     * @throws InvalidArgumentException
     *
     * @return DimensionGroup
     */
    public static function fromArray(array $data)
    {
        $bizTypeKey = BusinessType::none()->getKey();
        $scopeKey = Scope::none()->getKey();
        $countryKey = Country::none()->getKey();
        $publisherKey = Publisher::none()->getKey();

        if (!isset($data[$bizTypeKey], $data[$scopeKey], $data[$countryKey], $data[$publisherKey])) {
            throw new InvalidArgumentException('Required key/s not found');
        }

        $businessType = new BusinessType($data[$bizTypeKey]);
        $scope = new Scope($data[$scopeKey]);
        $country = new Country($data[$countryKey]);
        $publisher = new Publisher($data[$publisherKey]);

        return new static($businessType, $scope, $country, $publisher);
    }
}
