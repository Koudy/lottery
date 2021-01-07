<?php

namespace App\Domain\Factory\Interfaces;

use App\Domain\Prize\Structure\Interfaces\StructureGeneratorInterface;
use App\Domain\Repository\Interfaces\PrizeRepositoryInterface;

interface FactoryInterface
{
    /**
     * @return StructureGeneratorInterface
     */
    public function getStructureGenerator(): StructureGeneratorInterface;

    /**
     * @return PrizeRepositoryInterface
     */
    public function getRepository(): PrizeRepositoryInterface;
}
