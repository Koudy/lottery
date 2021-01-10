<?php

namespace App\Tests\Domain\Factory;

use App\Domain\Factory\ThingFactory;
use App\Domain\Prize\Structure\Thing\ThingGenerator;
use App\Domain\Repository\Interfaces\ThingPrizeRepositoryInterface;
use PHPUnit\Framework\TestCase;

class ThingFactoryTest extends TestCase
{
    public function testGetStructureGenerator(): void
    {
        $generator = $this->createMock(ThingGenerator::class);
        $repository = $this->createMock(ThingPrizeRepositoryInterface::class);

        $factory = new ThingFactory($generator, $repository);

        $this->assertSame($generator, $factory->getStructureGenerator());
    }

    public function testGetRepository(): void
    {
        $generator = $this->createMock(ThingGenerator::class);
        $repository = $this->createMock(ThingPrizeRepositoryInterface::class);

        $factory = new ThingFactory($generator, $repository);

        $this->assertSame($repository, $factory->getRepository());
    }
}
