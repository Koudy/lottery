<?php

namespace App\Domain\Prize\Structure\Money;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\SumGeneratorInterface;
use App\Domain\Prize\Structure\Money\Interfaces\FactoryInterface;
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
     * @var FactoryInterface
     */
    private FactoryInterface $moneyStructureFactory;

    /**
     * @param ConfigurationInterface $configuration
     * @param SumGeneratorInterface $sumGenerator
     * @param FactoryInterface $moneyStructureFactory
     */
    public function __construct(
        ConfigurationInterface $configuration,
        SumGeneratorInterface $sumGenerator,
        FactoryInterface $moneyStructureFactory
    )
    {
        $this->configuration = $configuration;
        $this->sumGenerator = $sumGenerator;
        $this->moneyStructureFactory = $moneyStructureFactory;
    }

    /**
     * @inheritDoc
     */
    public function generate(): StructureInterface
    {
        $sum = $this->sumGenerator->generate($this->configuration->getMoneyLimit());

        return $this->moneyStructureFactory->create($sum, $this->configuration->getCurrency());
    }
}
