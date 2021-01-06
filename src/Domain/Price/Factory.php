<?php

namespace App\Domain\Price;

use App\Domain\Price\Interfaces\FactoryInterface;
use App\Domain\Price\Interfaces\PriceInterface;
use App\Domain\Price\Interfaces\PriceStructureInterface;

class Factory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(
        string $type,
        string $userName,
        PriceStructureInterface $priceStructure
    ): PriceInterface
    {
        return new Price($type, $userName, $priceStructure);
    }
}
