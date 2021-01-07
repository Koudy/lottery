<?php

namespace App\Tests\Domain\Prize\Structure;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\SumGeneratorInterface;
use App\Domain\Prize\Structure\Interfaces\MoneyInterface;
use App\Domain\Prize\Structure\Interfaces\MoneyStructureFactoryInterface;
use App\Domain\Prize\Structure\MoneyStructureGenerator;
use PHPUnit\Framework\TestCase;

class MoneyStructureGeneratorTest extends TestCase
{
    private const SUM = 100;

    private const CURRENCY = 'currency';

    private const LIMIT = 1000;

    public function testGenerate(): void
    {
        $structure = $this->createMock(MoneyInterface::class);

        $configuration = $this->createMock(ConfigurationInterface::class);
        $configuration
            ->method('getCurrency')
            ->willReturn(self::CURRENCY);
        $configuration
            ->method('getMoneyLimit')
            ->willReturn(self::LIMIT);

        $structureFactory = $this->createMock(MoneyStructureFactoryInterface::class);
        $structureFactory
            ->method('create')
            ->with(self::SUM, self::CURRENCY)
            ->willReturn($structure);

        $sumGenerator = $this->createMock(SumGeneratorInterface::class);
        $sumGenerator
            ->method('generate')
            ->with(self::LIMIT)
            ->willReturn(self::SUM);

        $generator = new MoneyStructureGenerator($configuration, $sumGenerator, $structureFactory);

        $this->assertSame($structure, $generator->generate());
    }
}
