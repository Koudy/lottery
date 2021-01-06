<?php

namespace App\Domain\Factory\Interfaces;

use App\Domain\Price\Interfaces\StructureGeneratorInterface;
use App\Domain\Repository\Interfaces\PriceRepositoryInterface;

interface FactoryInterface
{
    /**
     * @return StructureGeneratorInterface
     */
    public function getStructureGenerator(): StructureGeneratorInterface;

    /**
     * @return PriceRepositoryInterface
     */
    public function getRepository(): PriceRepositoryInterface;
}
