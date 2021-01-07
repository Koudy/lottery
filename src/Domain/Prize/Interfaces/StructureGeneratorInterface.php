<?php

namespace App\Domain\Prize\Interfaces;

use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;

interface StructureGeneratorInterface
{
    /**
     * @return PrizeStructureInterface
     */
    public function generate(): PrizeStructureInterface;
}
