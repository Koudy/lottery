<?php

namespace App\Tests\Domain\Price;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\ItemRandomizerInterface;
use App\Domain\Price\TypeRandomizer;
use PHPUnit\Framework\TestCase;

class TypeRandomizerTest extends TestCase
{
    private const TYPE = 'type';

    public function testProvide(): void
    {
        $pricesTypes = ['type1', 'type2'];

        $configuration = $this->createMock(ConfigurationInterface::class);
        $configuration
            ->method('getPriceTypes')
            ->willReturn($pricesTypes);

        $itemRandomizer = $this->createMock(ItemRandomizerInterface::class);
        $itemRandomizer
            ->method('provide')
            ->with($pricesTypes)
            ->willReturn(self::TYPE);

        $randomizer = new TypeRandomizer($configuration, $itemRandomizer);

        $type = $randomizer->provide();

        $this->assertSame(self::TYPE, $type);
    }
}
