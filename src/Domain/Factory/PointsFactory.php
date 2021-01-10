<?php

namespace App\Domain\Factory;

use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;
use App\Domain\Prize\Structure\Points\Generator;
use App\Domain\Repository\Interfaces\PointsPrizeRepositoryInterface;
use App\Domain\Repository\Interfaces\PrizeRepositoryInterface;

class PointsFactory implements FactoryInterface
{
    /**
     * @var Generator
     */
    private Generator $pointsStructureGenerator;

    /**
     * @var PointsPrizeRepositoryInterface
     */
    private PointsPrizeRepositoryInterface $pointsPrizeRepository;

    /**
     * @param Generator $structureGenerator
     * @param PointsPrizeRepositoryInterface $pointsPrizeRepository
     */
    public function __construct(
        Generator $structureGenerator,
        PointsPrizeRepositoryInterface $pointsPrizeRepository
    )
    {
        $this->pointsStructureGenerator = $structureGenerator;
        $this->pointsPrizeRepository = $pointsPrizeRepository;
    }

    /**
     * @inheritDoc
     */
    public function getStructureGenerator(): GeneratorInterface
    {
        return $this->pointsStructureGenerator;
    }

    /**
     * @inheritDoc
     */
    public function getRepository(): PrizeRepositoryInterface
    {
        return $this->pointsPrizeRepository;
    }
}
