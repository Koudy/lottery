<?php

namespace App\Domain;


use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Factory\Interfaces\FactoriesSelectorInterface;
use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Factory\MoneyFactory;
use App\Domain\Factory\PointsFactory;

class FactoriesSelector implements FactoriesSelectorInterface
{
    /**
     * @var MoneyFactory
     */
    private MoneyFactory $moneyFactory;

    /**
     * @var PointsFactory
     */
    private PointsFactory $pointsFactory;

    /**
     * @param MoneyFactory $moneyFactory
     * @param PointsFactory $pointsFactory
     */
    public function __construct(
        MoneyFactory $moneyFactory,
        PointsFactory $pointsFactory
    ) {
        $this->moneyFactory = $moneyFactory;
        $this->pointsFactory = $pointsFactory;
    }

    /**
     * @inheritDoc
     */
    public function select(string $type): FactoryInterface
    {
        return match ($type) {
            ConfigurationInterface::PRICE_TYPE_MONEY => $this->moneyFactory,
            ConfigurationInterface::PRICE_TYPE_POINTS => $this->pointsFactory
        };
    }
}
