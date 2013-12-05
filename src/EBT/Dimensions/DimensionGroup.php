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
use EBT\Dimensions\Exception\InvalidArgumentException;

class DimensionGroup
{
    use IterableTrait;
    use CountableTrait;
    use EmptyTrait;
    use DirectAccessTrait;
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
        $dimensionKey = $dimension->getKey();

        if ($this->has($dimensionKey)) {
            throw new InvalidArgumentException(
                sprintf('A dimension with same name "%s" already present.', $dimensionKey)
            );
        }

        $this->collection[(string) $dimensionKey] = $dimension;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $dimensions = array();

        /** @var DimensionInterface $dimension */
        foreach ($this as $dimension) {
            $dimensions[$dimension::getSerializableKey()] = $dimension->getValue();
        }

        return $dimensions;
    }

    /**
     * @param array $data         array(
     *                              'dimension_key_1' => 'value',
     *                              'dimension_key_2' => 'value'
     *                            )
     *
     * @throws Exception\InvalidArgumentException
     * @return DimensionGroup
     */
    public static function fromArray(array $data)
    {
        if (
            !isset(
                $data[BusinessType::SERIALIZABLE_KEY],
                $data[Scope::SERIALIZABLE_KEY],
                $data[Country::SERIALIZABLE_KEY],
                $data[Publisher::SERIALIZABLE_KEY]
            )
        ) {
            throw new InvalidArgumentException('Required key not found');
        }
        $businessType = new BusinessType($data[BusinessType::SERIALIZABLE_KEY]);
        $scope = new Scope($data[Scope::SERIALIZABLE_KEY]);
        $country = new Country($data[Country::SERIALIZABLE_KEY]);
        $publisher = new Publisher($data[Publisher::SERIALIZABLE_KEY]);

        return new static($businessType, $scope, $country, $publisher);
    }
}
