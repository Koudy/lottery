<?php

namespace App\Domain\Repository;

use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Repository\Interfaces\PrizeRepositoryInterface;

class MoneyPrizeRepository implements PrizeRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function store(PrizeInterface $prize): void
    {
        // TODO: Implement store() method.
    }
}
