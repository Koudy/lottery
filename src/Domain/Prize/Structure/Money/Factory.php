<?php

namespace App\Domain\Prize\Structure\Money;

use App\Domain\Prize\Structure\Money\Interfaces\FactoryInterface;

class Factory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $sum, string $currency): Money
    {
        return new Money($sum, $currency);
    }
}
