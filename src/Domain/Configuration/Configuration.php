<?php

namespace App\Domain\Configuration;

class Configuration implements ConfigurationInterface
{
    /**
     * @var array s
     */
    private array $prizeTypes;

    /**
     * @var string
     */
    private string $currency;

    /**
     * @var int
     */
    private int $moneyLimit;

    /**
     * @param array $prizeTypes
     * @param string $currency
     * @param int $moneyLimit
     */
    public function __construct(array $prizeTypes, string $currency, int $moneyLimit)
    {
        $this->prizeTypes = $prizeTypes;
        $this->currency = $currency;
        $this->moneyLimit = $moneyLimit;
    }

    /**
     * @inheritDoc
     */
    public function getPrizeTypes(): array
    {
        return $this->prizeTypes;
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
