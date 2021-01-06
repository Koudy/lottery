<?php

namespace App\Domain\Price\Structure\Interfaces;

use App\Domain\Price\Interfaces\PriceStructureInterface;

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
