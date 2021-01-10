<?php

namespace App\Tests\Domain\Prize\Structure\Money;

use App\Domain\Prize\Structure\Money\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    private const SUM = 100;

    private const CURRENCY = 'currency';

    public function testGetParameters(): void
    {
        $money = new Money(self::SUM, self::CURRENCY);

        $expectedParameters = [
            'sum' => self::SUM,
            'currency' => self::CURRENCY
        ];

        $this->assertSame($expectedParameters, $money->getParameters());
    }

    public function testGetDescription(): void
    {
        $money = new Money(self::SUM, self::CURRENCY);

        $this->assertSame(self::SUM . ' ' . self::CURRENCY, $money->getDescription());
    }
}
