<?php

namespace App\Domain\Repository\Interfaces;

use App\Domain\Price\Interfaces\PriceInterface;

interface PriceRepositoryInterface
{
    /**
     * @param PriceInterface $price
     */
    public function store(PriceInterface $price): void;
}
