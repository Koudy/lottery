<?php

namespace App\Domain;


use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Factory\Interfaces\FactoriesSelectorInterface;
use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Factory\MoneyFactory;

class FactoriesSelector implements FactoriesSelectorInterface
{
    /**
     * @var MoneyFactory
     */
    private MoneyFactory $moneyFactory;

    /**
     * @param MoneyFactory $moneyFactory
     */
    public function __construct(MoneyFactory $moneyFactory)
    {
        $this->moneyFactory = $moneyFactory;
    }

    public function select(string $type): FactoryInterface
    {
        return match ($type) {
            ConfigurationInterface::PRICE_TYPE_MONEY => $this->moneyFactory
        };
    }
}
