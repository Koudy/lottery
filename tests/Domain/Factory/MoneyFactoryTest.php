<?php

namespace App\Tests\Domain\Factory;

use App\Domain\Factory\MoneyFactory;
use App\Domain\Price\Structure\MoneyStructureGenerator;
use App\Domain\Repository\MoneyPriceRepository;
use PHPUnit\Framework\TestCase;

class MoneyFactoryTest extends TestCase
{
    public function testGetStructureGenerator(): void
    {
        $generator = $this->createMock(MoneyStructureGenerator::class);
        $repository = $this->createMock(MoneyPriceRepository::class);

        $factory = new MoneyFactory($generator, $repository);


        $this->assertSame($generator, $factory->getStructureGenerator());
    }

    public function testGetRepository(): void
    {
        $generator = $this->createMock(MoneyStructureGenerator::class);
        $repository = $this->createMock(MoneyPriceRepository::class);

        $factory = new MoneyFactory($generator, $repository);

        $this->assertSame($repository, $factory->getRepository());
    }
}
