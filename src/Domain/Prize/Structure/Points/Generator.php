<?php

namespace App\Domain\Prize\Structure\Points;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\SumGeneratorInterface;
use App\Domain\Prize\Structure\Points\Interfaces\PointsFactoryInterface;
use App\Domain\Prize\Structure\Interfaces\StructureInterface;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;

class Generator implements GeneratorInterface
{
    /**
     * @var ConfigurationInterface
     */
    private ConfigurationInterface $configuration;

    /**
     * @var SumGeneratorInterface
     */
    private SumGeneratorInterface $sumGenerator;

    /**
     * @var PointsFactoryInterface
     */
    private PointsFactoryInterface $pointsStructureFactory;

    /**
     * @param ConfigurationInterface $configuration
     * @param SumGeneratorInterface $sumGenerator
     * @param PointsFactoryInterface $pointsStructureFactory
     */
    public function __construct(
        ConfigurationInterface $configuration,
        SumGeneratorInterface $sumGenerator,
        PointsFactoryInterface $pointsStructureFactory
    )
    {
        $this->configuration = $configuration;
        $this->sumGenerator = $sumGenerator;
        $this->pointsStructureFactory = $pointsStructureFactory;
    }

    /**
     * @inheritDoc
     */
    public function generate(): StructureInterface
    {
        $sum = $this->sumGenerator->generate($this->configuration->getPointsLimit());

        return $this->pointsStructureFactory->create($sum);
    }
}
