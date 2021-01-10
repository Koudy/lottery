<?php

namespace App\Domain\Factory;

use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;
use App\Domain\Prize\Structure\Points\PointsGenerator;
use App\Domain\Repository\Interfaces\PointsPrizeRepositoryInterface;
use App\Domain\Repository\Interfaces\PrizeRepositoryInterface;

class PointsFactory implements FactoryInterface
{
    /**
     * @var PointsGenerator
     */
    private PointsGenerator $pointsStructureGenerator;

    /**
     * @var PointsPrizeRepositoryInterface
     */
    private PointsPrizeRepositoryInterface $pointsPrizeRepository;

    /**
     * @param PointsGenerator $structureGenerator
     * @param PointsPrizeRepositoryInterface $pointsPrizeRepository
     */
    public function __construct(
        PointsGenerator $structureGenerator,
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
