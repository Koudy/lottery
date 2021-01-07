<?php

namespace App\Domain\Prize\Interfaces;

use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;

interface FactoryInterface
{
    /**
     * @param string $type
     * @param string $userName
     * @param PrizeStructureInterface $prizeStructure
     * @return PrizeInterface
     */
    public function create(
        string $type,
        string $userName,
        PrizeStructureInterface $prizeStructure
    ): PrizeInterface;
}
