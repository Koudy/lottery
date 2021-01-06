<?php

namespace App\Domain\Price\Structure;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\SumGeneratorInterface;
use App\Domain\Price\Interfaces\PriceStructureInterface;
use App\Domain\Price\Interfaces\StructureGeneratorInterface;
use App\Domain\Price\Structure\Interfaces\MoneyStructureFactoryInterface;

class MoneyStructureGenerator implements StructureGeneratorInterface
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
     * @var MoneyStructureFactoryInterface
     */
    private MoneyStructureFactoryInterface $moneyStructureFactory;

    /**
     * @param ConfigurationInterface $configuration
     * @param SumGeneratorInterface $sumGenerator
     * @param MoneyStructureFactoryInterface $moneyStructureFactory
     */
    public function __construct(
        ConfigurationInterface $configuration,
        SumGeneratorInterface $sumGenerator,
        MoneyStructureFactoryInterface $moneyStructureFactory
    )
    {
        $this->configuration = $configuration;
        $this->sumGenerator = $sumGenerator;
        $this->moneyStructureFactory = $moneyStructureFactory;
    }

    /**
     * @inheritDoc
     */
    public function generate(): PriceStructureInterface
    {
        $sum = $this->sumGenerator->generate($this->configuration->getMoneyLimit());

        return $this->moneyStructureFactory->create($sum, $this->configuration->getCurrency());
    }
}
