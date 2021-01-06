<?php

namespace App\Domain\Configuration;

class Configuration implements ConfigurationInterface
{
    /**
     * @var array s
     */
    private array $priceTypes;

    /**
     * @var string
     */
    private string $currency;

    /**
     * @var int
     */
    private int $moneyLimit;

    /**
     * @param array $priceTypes
     * @param string $currency
     * @param int $moneyLimit
     */
    public function __construct(array $priceTypes, string $currency, int $moneyLimit)
    {
        $this->priceTypes = $priceTypes;
        $this->currency = $currency;
        $this->moneyLimit = $moneyLimit;
    }

    /**
     * @inheritDoc
     */
    public function getPriceTypes(): array
    {
        return $this->priceTypes;
    }

    /**
     * @inheritDoc
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @inheritDoc
     */
    public function getMoneyLimit(): int
    {
        return $this->moneyLimit;
    }
}
