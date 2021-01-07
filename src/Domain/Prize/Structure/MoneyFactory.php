<?php

namespace App\Domain\Prize\Structure;

use App\Domain\Prize\Structure\Interfaces\MoneyFactoryInterface;

class MoneyFactory implements MoneyFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $sum, string $currency): Money
    {
        return new Money($sum, $currency);
    }
}
