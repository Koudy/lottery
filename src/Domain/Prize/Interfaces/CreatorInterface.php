<?php

namespace App\Domain\Prize\Interfaces;

use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;

interface CreatorInterface
{
    /**
     * @param string $type
     * @param string $userName
     * @param GeneratorInterface $structureGenerator
     * @return PrizeInterface
     */
    public function create(
        string $type,
        string $userName,
        GeneratorInterface $structureGenerator
    ): PrizeInterface;
}
