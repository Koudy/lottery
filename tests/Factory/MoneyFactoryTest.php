<?php

namespace App\Tests\Factory;

use App\Entity\Prize;
use App\Factory\MoneyFactory;
use PHPUnit\Framework\TestCase;

class MoneyFactoryTest extends TestCase
{
    private const SUM = 100;

    private const CURRENCY = 'currency';

    public function testCreate():void
    {
        $factory = new MoneyFactory();

        $prize = $this->createMock(Prize::class);

        $money = $factory->create($prize, self::SUM, self::CURRENCY);

        $this->assertSame($prize, $money->getPrize());
        $this->assertSame(self::SUM, $money->getSum());
        $this->assertSame(self::CURRENCY, $money->getCurrency());
    }
}
