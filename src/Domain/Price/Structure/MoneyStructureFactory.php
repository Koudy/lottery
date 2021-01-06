<?php

namespace App\Domain\Price\Structure;

use App\Domain\Price\Structure\Interfaces\MoneyInterface;
use App\Domain\Price\Structure\Interfaces\MoneyStructureFactoryInterface;

class MoneyStructureFactory implements MoneyStructureFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $sum, string $currency): MoneyInterface
    {
        return new Money($sum, $currency);
    }
}
