<?php

namespace App\Domain\Price\Interfaces;

use App\Domain\Price\Structure\Interfaces\PriceStructureInterface;

interface StructureGeneratorInterface
{
    /**
     * @return PriceStructureInterface
     */
    public function generate(): PriceStructureInterface;
}
