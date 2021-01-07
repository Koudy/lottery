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
        $structure = $this->createMock(Money::class);

        $configuration = $this->createMock(ConfigurationInterface::class);
        $configuration
            ->method('getCurrency')
            ->willReturn(self::CURRENCY);
        $configuration
            ->method('getMoneyLimit')
            ->willReturn(self::LIMIT);

        $structureFactory = $this->createMock(MoneyFactoryInterface::class);
        $structureFactory
            ->method('create')
            ->with(self::SUM, self::CURRENCY)
            ->willReturn($structure);

        $sumGenerator = $this->createMock(SumGeneratorInterface::class);
        $sumGenerator
            ->method('generate')
            ->with(self::LIMIT)
            ->willReturn(self::SUM);

        $generator = new MoneyGenerator($configuration, $sumGenerator, $structureFactory);

        $this->assertSame($structure, $generator->generate());
    }
}
