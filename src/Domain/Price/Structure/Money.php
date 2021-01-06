<?php

namespace App\Domain\Price\Structure;

use App\Domain\Price\Structure\Interfaces\MoneyInterface;

class Money implements MoneyInterface
{
    /**
     * @var int
     */
    private int $sum;

    /**
     * @var string
     */
    private string $currency;

    /**
     * @param int $sum
     * @param string $currency
     */
    public function __construct(int $sum, string $currency)
    {
        $this->sum = $sum;
        $this->currency = $currency;
    }

    /**
     * @inheritDoc
     */
    public function getSum(): int
    {
        return $this->sum;
    }

    /**
     * @inheritDoc
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
}
