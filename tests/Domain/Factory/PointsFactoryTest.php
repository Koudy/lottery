<?php

namespace App\Tests\Domain\Factory;

use App\Domain\Factory\PointsFactory;
use App\Domain\Prize\Structure\PointsGenerator;
use App\Domain\Repository\Interfaces\PointsPrizeRepositoryInterface;
use PHPUnit\Framework\TestCase;

class PointsFactoryTest extends TestCase
{
    public function testGetStructureGenerator(): void
    {
        $generator = $this->createMock(PointsGenerator::class);
        $repository = $this->createMock(PointsPrizeRepositoryInterface::class);

        $factory = new PointsFactory($generator, $repository);

        $this->assertSame($generator, $factory->getStructureGenerator());
    }

    public function testGetRepository(): void
    {
        $generator = $this->createMock(PointsGenerator::class);
        $repository = $this->createMock(PointsPrizeRepositoryInterface::class);

        $factory = new PointsFactory($generator, $repository);

        $this->assertSame($repository, $factory->getRepository());
    }
}
