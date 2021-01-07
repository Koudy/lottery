<?php

namespace App\Domain\Prize\Interfaces;

use App\Domain\Prize\Structure\Interfaces\StructureGeneratorInterface;

interface CreatorInterface
{
    /**
     * @param string $type
     * @param string $userName
     * @param StructureGeneratorInterface $structureGenerator
     * @return PrizeInterface
     */
    public function create(
        string $type,
        string $userName,
        StructureGeneratorInterface $structureGenerator
    ): PrizeInterface;
}
