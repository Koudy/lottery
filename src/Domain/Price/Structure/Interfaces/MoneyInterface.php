<?php

namespace App\Domain\Price\Structure\Interfaces;

interface MoneyInterface extends PriceStructureInterface
{
    /**
     * @return int
     */
    public function getSum(): int;

    /**
     * @return string
     */
    public function getCurrency(): string;
}
