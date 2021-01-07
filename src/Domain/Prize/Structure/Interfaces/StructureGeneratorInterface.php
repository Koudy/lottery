<?php

namespace App\Domain\Prize\Structure\Interfaces;

interface StructureGeneratorInterface
{
    /**
     * @return PrizeStructureInterface
     */
    public function generate(): PrizeStructureInterface;
}
