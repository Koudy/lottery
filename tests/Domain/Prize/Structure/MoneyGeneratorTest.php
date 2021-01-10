<?php

namespace App\Tests\Domain\Prize\Structure;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\SumGeneratorInterface;
use App\Domain\Prize\Structure\Interfaces\MoneyFactoryInterface;
use App\Domain\Prize\Structure\Money;
use App\Domain\Prize\Structure\MoneyGenerator;
use PHPUnit\Framework\TestCase;

class MoneyGeneratorTest extends TestCase
{
    private const SUM = 100;

    private const CURRENCY = 'currency';

    private const LIMIT = 1000;

    public function testGenerate(): void
    {
        $configuration = $this->createMock(ConfigurationInterface::class);
        $configuration
            ->method('getCurrency')
            ->willReturn(self::CURRENCY);
        $configuration
            ->method('getMoneyLimit')
            ->willReturn(self::LIMIT);

        $money = $this->createMock(Money::class);

        $moneyFactory = $this->createMock(MoneyFactoryInterface::class);
        $moneyFactory
            ->method('create')
            ->with(self::SUM, self::CURRENCY)
            ->willReturn($money);

        $sumGenerator = $this->createMock(SumGeneratorInterface::class);
        $sumGenerator
            ->method('generate')
            ->with(self::LIMIT)
            ->willReturn(self::SUM);

        $generator = new MoneyGenerator($configuration, $sumGenerator, $moneyFactory);

        $this->assertSame($money, $generator->generate());
    }
}
