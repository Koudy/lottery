<?php

namespace App\Tests\Domain\Factory;

use App\Domain\Factory\MoneyFactory;
use App\Domain\Prize\Structure\Money\MoneyGenerator;
use App\Domain\Repository\Interfaces\MoneyPrizeRepositoryInterface;
use PHPUnit\Framework\TestCase;

class MoneyFactoryTest extends TestCase
{
    public function testGetStructureGenerator(): void
    {
        $generator = $this->createMock(MoneyGenerator::class);
        $repository = $this->createMock(MoneyPrizeRepositoryInterface::class);

        $factory = new MoneyFactory($generator, $repository);

        $this->assertSame($generator, $factory->getStructureGenerator());
    }

    public function testGetRepository(): void
    {
        $generator = $this->createMock(MoneyGenerator::class);
        $repository = $this->createMock(MoneyPrizeRepositoryInterface::class);

        $factory = new MoneyFactory($generator, $repository);

        $this->assertSame($repository, $factory->getRepository());
    }
}
