<?php

namespace App\Domain\Prize\Interfaces;

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
