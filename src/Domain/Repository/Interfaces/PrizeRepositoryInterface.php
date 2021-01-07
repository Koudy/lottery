<?php

namespace App\Domain\Repository\Interfaces;

use App\Domain\Prize\Interfaces\PrizeInterface;

interface PrizeRepositoryInterface
{
    /**
     * @param PrizeInterface $prize
     */
    public function store(PrizeInterface $prize): void;
}
