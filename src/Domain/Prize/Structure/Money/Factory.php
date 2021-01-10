<?php

namespace App\Domain\Prize\Structure\Money;

use App\Domain\Prize\Structure\Interfaces\MoneyFactoryInterface;

class Factory implements MoneyFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $sum, string $currency): Money
    {
        return new Money($sum, $currency);
    }
}
