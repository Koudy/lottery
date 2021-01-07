<?php

namespace App\Tests\Domain\Price;

use App\Domain\Price\Interfaces\StructureGeneratorInterface;
use App\Domain\Price\Interfaces\FactoryInterface;
use App\Domain\Price\Interfaces\PriceInterface;
use App\Domain\Price\PriceCreator;
use App\Domain\Price\Structure\Interfaces\PriceStructureInterface;
use PHPUnit\Framework\TestCase;

class PriceCreatorTest extends TestCase
{
    private const PRICE_TYPE = 'price type';

    private const USER_NAME = 'Some unique user name';

    public function testCreate(): void
    {
        $structure = $this->createMock(PriceStructureInterface::class);

        $structureGenerator = $this->createMock(StructureGeneratorInterface::class);
        $structureGenerator
            ->method('generate')
            ->willReturn($structure);

        $price = $this->createMock(PriceInterface::class);

        $priceFactory = $this->createMock(FactoryInterface::class);
        $priceFactory
            ->method('create')
            ->with(self::PRICE_TYPE, self::USER_NAME, $structure)
            ->willReturn($price);

        $priceCreator = new PriceCreator($priceFactory);

        $this->assertSame(
            $price,
            $priceCreator->create(
                self::PRICE_TYPE,
                self::USER_NAME, $structureGenerator
            )
        );
    }
}
