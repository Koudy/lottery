<?php

namespace App\Domain;


use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Factory\Interfaces\FactoriesSelectorInterface;
use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Factory\MoneyFactory;
use App\Domain\Factory\PointsFactory;
use App\Domain\Factory\ThingFactory;

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
     * @var ThingFactory
     */
    private ThingFactory $thingFactory;

    /**
     * @param MoneyFactory $moneyFactory
     * @param PointsFactory $pointsFactory
     * @param ThingFactory $thingFactory
     */
    public function __construct(
        MoneyFactory $moneyFactory,
        PointsFactory $pointsFactory,
        ThingFactory $thingFactory
    ) {
        $this->moneyFactory = $moneyFactory;
        $this->pointsFactory = $pointsFactory;
        $this->thingFactory = $thingFactory;
    }

    /**
     * @inheritDoc
     */
    public function select(string $type): FactoryInterface
    {
        return match ($type) {
            ConfigurationInterface::PRICE_TYPE_MONEY => $this->moneyFactory,
            ConfigurationInterface::PRICE_TYPE_POINTS => $this->pointsFactory,
            ConfigurationInterface::PRICE_TYPE_THING => $this->thingFactory
        };
    }
}
