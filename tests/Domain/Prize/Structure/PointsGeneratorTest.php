<?php

namespace App\Tests\Domain\Prize\Structure;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\SumGeneratorInterface;
use App\Domain\Prize\Structure\Interfaces\PointsFactoryInterface;
use App\Domain\Prize\Structure\Points;
use App\Domain\Prize\Structure\PointsGenerator;
use PHPUnit\Framework\TestCase;

class PointsGeneratorTest extends TestCase
{
    private const SUM = 100;

    private const LIMIT = 1000;

    public function testGenerate(): void
    {
        $structure = $this->createMock(Points::class);

        $configuration = $this->createMock(ConfigurationInterface::class);
        $configuration
            ->method('getPointsLimit')
            ->willReturn(self::LIMIT);

        $structureFactory = $this->createMock(PointsFactoryInterface::class);
        $structureFactory
            ->method('create')
            ->with(self::SUM)
            ->willReturn($structure);

        $sumGenerator = $this->createMock(SumGeneratorInterface::class);
        $sumGenerator
            ->method('generate')
            ->with(self::LIMIT)
            ->willReturn(self::SUM);

        $generator = new PointsGenerator($configuration, $sumGenerator, $structureFactory);

        $this->assertSame($structure, $generator->generate());
    }
}
