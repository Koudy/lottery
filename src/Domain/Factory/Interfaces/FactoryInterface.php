<?php

namespace App\Domain\Factory\Interfaces;

use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;
use App\Domain\Repository\Interfaces\PrizeRepositoryInterface;

interface FactoryInterface
{
    /**
     * @return GeneratorInterface
     */
    public function getStructureGenerator(): GeneratorInterface;

    /**
     * @return PrizeRepositoryInterface
     */
    public function getRepository(): PrizeRepositoryInterface;
}
