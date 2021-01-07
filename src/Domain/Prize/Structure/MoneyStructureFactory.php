<?php

namespace App\Domain\Prize\Structure;

use App\Domain\Prize\Structure\Interfaces\MoneyInterface;
use App\Domain\Prize\Structure\Interfaces\MoneyStructureFactoryInterface;

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
