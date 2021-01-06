<?php

namespace App\Domain\Price\Interfaces;

interface StructureGeneratorInterface
{
    /**
     * @return PriceStructureInterface
     */
    public function generate(): PriceStructureInterface;
}
