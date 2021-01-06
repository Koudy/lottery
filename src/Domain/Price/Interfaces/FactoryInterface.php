<?php

namespace App\Domain\Price\Interfaces;

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
