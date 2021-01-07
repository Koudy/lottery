<?php

namespace App\Domain\Price\Interfaces;

use App\Domain\Price\Structure\Interfaces\PriceStructureInterface;

interface FactoryInterface
{
    /**
     * @param string $type
     * @param string $userName
     * @param PriceStructureInterface $priceStructure
     * @return PriceInterface
     */
    public function create(
        string $type,
        string $userName,
        PriceStructureInterface $priceStructure
    ): PriceInterface;
}
