<?php

namespace App\Tests\Domain\Price;

use App\Domain\Price\Factory;
use App\Domain\Price\Interfaces\PriceInterface;
use App\Domain\Price\Interfaces\PriceStructureInterface;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    private const TYPE = 'type';

    private const USER_NAME = 'Some user name';

    public function testCreate(): void
    {
        $factory = new Factory();

        $structure = $this->createMock(PriceStructureInterface::class);

        $price = $factory->create(self::TYPE, self::USER_NAME, $structure);

        $this->assertInstanceOf(PriceInterface::class, $price);
        $this->assertSame(self::TYPE, $price->getType());
        $this->assertSame(self::USER_NAME, $price->getUserName());
        $this->assertSame($structure, $price->getStructure());
    }
}
