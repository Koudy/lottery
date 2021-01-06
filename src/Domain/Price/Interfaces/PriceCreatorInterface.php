<?php

namespace App\Domain\Price\Interfaces;

interface PriceCreatorInterface
{
    /**
     * @param string $type
     * @param string $userName
     * @param StructureGeneratorInterface $structureGenerator
     * @return PriceInterface
     */
    public function create(
        string $type,
        string $userName,
        StructureGeneratorInterface $structureGenerator
    ): PriceInterface;
}
