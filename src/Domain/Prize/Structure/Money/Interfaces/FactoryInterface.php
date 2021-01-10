<?php

namespace App\Domain\Prize\Structure\Money\Interfaces;

use App\Domain\Prize\Structure\Money\Money;

interface FactoryInterface
{
    /**
     * @param int $sum
     * @param string $currency
     * @return Money
     */
    public function create(int $sum, string $currency): Money;
}
