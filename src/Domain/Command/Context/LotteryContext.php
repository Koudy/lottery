<?php

namespace App\Domain\Command\Context;

use App\Domain\Command\Context\Interfaces\LotteryContextInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;

class LotteryContext implements LotteryContextInterface
{
    /**
     * @var string
     */
    private string $userName;

    /**
     * @var PrizeInterface|null
     */
    private ?PrizeInterface $prize = null;

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
    public function getPrize(): ?PrizeInterface
    {
        return $this->prize;
    }

    /**
     * @inheritDoc
     */
    public function setPrize(PrizeInterface $prize): void
    {
        $this->prize = $prize;
    }
}
