<?php

namespace App\Domain\Prize\Structure\Interfaces;

interface MoneyInterface extends PrizeStructureInterface
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
