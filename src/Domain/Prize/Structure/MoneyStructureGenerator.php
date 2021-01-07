<?php

namespace App\Domain\Prize\Structure;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\SumGeneratorInterface;
use App\Domain\Prize\Structure\Interfaces\MoneyStructureFactoryInterface;
use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;
use App\Domain\Prize\Structure\Interfaces\StructureGeneratorInterface;

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
    public function generate(): PrizeStructureInterface
    {
        $sum = $this->sumGenerator->generate($this->configuration->getMoneyLimit());

        return $this->moneyStructureFactory->create($sum, $this->configuration->getCurrency());
    }
}
