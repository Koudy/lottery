<?php

namespace App\Domain\Command\Context\Interfaces;

use App\Domain\Prize\Interfaces\PrizeInterface;

interface LotteryContextInterface
{
    /**
     * @return string
     */
    public function getUserName(): string;

    /**
     * @return PrizeInterface|null
     */
    public function getPrize(): ?PrizeInterface;

    /**
     * @param PrizeInterface $prize
     */
    public function setPrize(PrizeInterface $prize): void;
}
