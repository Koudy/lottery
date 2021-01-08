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
     * @var int
     */
    private int $pointsLimit;

    /**
     * @param array $prizeTypes
     * @param string $currency
     * @param int $moneyLimit
     * @param int $pointsLimit
     */
    public function __construct(
        array $prizeTypes,
        string $currency,
        int $moneyLimit,
        int $pointsLimit
    ) {
        $this->prizeTypes = $prizeTypes;
        $this->currency = $currency;
        $this->moneyLimit = $moneyLimit;
        $this->pointsLimit = $pointsLimit;
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

    /**
     * @inheritDoc
     */
    public function getPointsLimit(): int
    {
        return $this->pointsLimit;
    }
}
