<?php

namespace App\Tests\Domain\Command\Context;

use App\Domain\Command\Context\LotteryContext;
use App\Domain\Prize\Interfaces\PrizeInterface;
use PHPUnit\Framework\TestCase;

class LotteryContextTest extends TestCase
{
    private const USER_NAME = 'Some unique user name';

    public function testGetUserName(): void
    {
        $context = new LotteryContext(self::USER_NAME);

        $this->assertSame(self::USER_NAME, $context->getUserName());
    }

    public function testGetPrize(): void
    {
        $context = new LotteryContext(self::USER_NAME);

        $prize = $this->createMock(PrizeInterface::class);

        $context->setPrize($prize);

        $this->assertSame($prize, $context->getPrize());
    }

    public function testGetPrizeWhenNoPrize(): void
    {
        $context = new LotteryContext(self::USER_NAME);

        $this->assertNull($context->getPrize());
    }
}
