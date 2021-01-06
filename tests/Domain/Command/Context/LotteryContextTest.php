<?php

namespace App\Tests\Domain\Command\Context;

use App\Domain\Command\Context\LotteryContext;
use App\Domain\Price\Interfaces\PriceInterface;
use PHPUnit\Framework\TestCase;

class LotteryContextTest extends TestCase
{
    private const USER_NAME = 'Some unique user name';

    public function testGetUserName(): void
    {
        $context = new LotteryContext(self::USER_NAME);

        $this->assertSame(self::USER_NAME, $context->getUserName());
    }

    public function testGetPrice(): void
    {
        $context = new LotteryContext(self::USER_NAME);

        $price = $this->createMock(PriceInterface::class);

        $context->setPrice($price);

        $this->assertSame($price, $context->getPrice());
    }

    public function testGetPriceWhenNoPrice(): void
    {
        $context = new LotteryContext(self::USER_NAME);

        $this->assertNull($context->getPrice());
    }
}
