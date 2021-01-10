<?php

namespace App\Domain\Prize\Interfaces;

use App\Domain\Prize\Structure\Interfaces\StructureInterface;

interface FactoryInterface
{
    /**
     * @param string $type
     * @param string $userName
     * @param StructureInterface $prizeStructure
     * @return PrizeInterface
     */
    public function create(
        string $type,
        string $userName,
        StructureInterface $prizeStructure
    ): PrizeInterface;
}
