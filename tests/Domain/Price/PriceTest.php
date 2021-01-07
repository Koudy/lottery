<?php

namespace App\Tests\Domain\Price;

use App\Domain\Price\Price;
use App\Domain\Price\Structure\Interfaces\PriceStructureInterface;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    private const TYPE = 'type';

    private const USER_NAME = 'Some user name';

    public function testGetType(): void
    {
        $structure = $this->createMock(PriceStructureInterface::class);

        $price = new Price(self::TYPE, self::USER_NAME, $structure);

        $this->assertSame(self::TYPE, $price->getType());
        $this->assertSame(self::USER_NAME, $price->getUserName());
        $this->assertSame($structure, $price->getStructure());
    }
}
