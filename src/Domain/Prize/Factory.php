<?php

namespace App\Domain\Prize;

use App\Domain\Prize\Interfaces\FactoryInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Structure\Interfaces\StructureInterface;

class Factory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(
        string $type,
        string $userName,
        StructureInterface $prizeStructure
    ): PrizeInterface
    {
        return new Prize($type, $userName, $prizeStructure);
    }
}
