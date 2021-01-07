<?php

namespace App\Domain\Prize\Structure\Interfaces;

use App\Domain\Prize\Structure\Money;

interface MoneyFactoryInterface
{
    /**
     * @param int $sum
     * @param string $currency
     * @return Money
     */
    public function create(int $sum, string $currency): Money;
}