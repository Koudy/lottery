<?php

namespace App\Tests\Domain\Prize\Structure;

use App\Domain\Prize\Structure\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    private const SUM = 100;

    private const CURRENCY = 'currency';

    public function testGetSum(): void
    {
        $money = new Money(self::SUM, self::CURRENCY);

        $this->assertSame(self::SUM, $money->getSum());
        $this->assertSame(self::CURRENCY, $money->getCurrency());
    }
}
