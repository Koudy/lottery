<?php

namespace App\Domain\Repository;

use App\Domain\Price\Interfaces\PriceInterface;
use App\Domain\Repository\Interfaces\PriceRepositoryInterface;

class MoneyPriceRepository implements PriceRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function store(PriceInterface $price): void
    {
        // TODO: Implement store() method.
    }
}
