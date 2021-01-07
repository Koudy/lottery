<?php

namespace App\Domain\Prize\Structure\Interfaces;

interface MoneyStructureFactoryInterface
{
    /**
     * @param int $sum
     * @param string $currency
     * @return MoneyInterface
     */
    public function create(int $sum, string $currency): MoneyInterface;
}
