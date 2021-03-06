<?php

namespace App\Tests\Domain\Prize\Structure\Points;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\SumGeneratorInterface;
use App\Domain\Prize\Structure\Points\Interfaces\FactoryInterface;
use App\Domain\Prize\Structure\Points\Points;
use App\Domain\Prize\Structure\Points\Generator;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    private const SUM = 100;

    private const LIMIT = 1000;

    public function testGenerate(): void
    {
        $configuration = $this->createMock(ConfigurationInterface::class);
        $configuration
            ->method('getPointsLimit')
            ->willReturn(self::LIMIT);

        $points = $this->createMock(Points::class);

        $pointsFactory = $this->createMock(FactoryInterface::class);
        $pointsFactory
            ->method('create')
            ->with(self::SUM)
            ->willReturn($points);

        $sumGenerator = $this->createMock(SumGeneratorInterface::class);
        $sumGenerator
            ->method('generate')
            ->with(self::LIMIT)
            ->willReturn(self::SUM);

        $generator = new Generator($configuration, $sumGenerator, $pointsFactory);

        $this->assertSame($points, $generator->generate());
    }
}
