<?php

namespace App\Domain\Factory;

use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;
use App\Domain\Prize\Structure\Thing\Generator;
use App\Domain\Repository\Interfaces\ThingPrizeRepositoryInterface;
use App\Domain\Repository\Interfaces\PrizeRepositoryInterface;

class ThingFactory implements FactoryInterface
{
    /**
     * @var Generator
     */
    private Generator $thingStructureGenerator;

    /**
     * @var ThingPrizeRepositoryInterface
     */
    private ThingPrizeRepositoryInterface $thingPrizeRepository;

    /**
     * @param Generator $structureGenerator
     * @param ThingPrizeRepositoryInterface $thingPrizeRepository
     */
    public function __construct(
        Generator $structureGenerator,
        ThingPrizeRepositoryInterface $thingPrizeRepository
    )
    {
        $this->thingStructureGenerator = $structureGenerator;
        $this->thingPrizeRepository = $thingPrizeRepository;
    }

    /**
     * @inheritDoc
     */
    public function getStructureGenerator(): GeneratorInterface
    {
        return $this->thingStructureGenerator;
    }

    /**
     * @inheritDoc
     */
    public function getRepository(): PrizeRepositoryInterface
    {
        return $this->thingPrizeRepository;
    }
}
