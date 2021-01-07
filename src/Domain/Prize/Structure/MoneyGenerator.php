<?php

namespace App\Domain\Prize\Structure;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\SumGeneratorInterface;
use App\Domain\Prize\Structure\Interfaces\MoneyFactoryInterface;
use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;

class MoneyGenerator implements GeneratorInterface
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
     * @var MoneyFactoryInterface
     */
    private MoneyFactoryInterface $moneyStructureFactory;

    /**
     * @param ConfigurationInterface $configuration
     * @param SumGeneratorInterface $sumGenerator
     * @param MoneyFactoryInterface $moneyStructureFactory
     */
    public function __construct(
        ConfigurationInterface $configuration,
        SumGeneratorInterface $sumGenerator,
        MoneyFactoryInterface $moneyStructureFactory
    )
    {
        $this->configuration = $configuration;
        $this->sumGenerator = $sumGenerator;
        $this->moneyStructureFactory = $moneyStructureFactory;
    }

    /**
     * @inheritDoc
     */
    public function generate(): PrizeStructureInterface
    {
        $sum = $this->sumGenerator->generate($this->configuration->getMoneyLimit());

        return $this->moneyStructureFactory->create($sum, $this->configuration->getCurrency());
    }
}
