<?php

namespace App\Domain\Command\Context\Interfaces;

use App\Domain\Price\Interfaces\PriceInterface;

interface LotteryContextInterface
{
    /**
     * @return string
     */
    public function getUserName(): string;

    /**
     * @return PriceInterface|null
     */
    public function getPrice(): ?PriceInterface;

    /**
     * @param PriceInterface $price
     */
    public function setPrice(PriceInterface $price): void;
}
