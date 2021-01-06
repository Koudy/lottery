<?php

namespace App\Domain\Command\Context;

use App\Domain\Command\Context\Interfaces\LotteryContextInterface;
use App\Domain\Price\Interfaces\PriceInterface;

class LotteryContext implements LotteryContextInterface
{
    /**
     * @var string
     */
    private string $userName;

    /**
     * @var PriceInterface|null
     */
    private ?PriceInterface $price = null;

    /**
     * @param string $userId
     */
    public function __construct(string $userId)
    {
        $this->userName = $userId;
    }

    /**
     * @inheritDoc
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @inheritDoc
     */
    public function getPrice(): ?PriceInterface
    {
        return $this->price;
    }

    /**
     * @inheritDoc
     */
    public function setPrice(PriceInterface $price): void
    {
        $this->price = $price;
    }
}
