<?php

namespace App\Tests\Domain\Prize;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\ItemRandomizerInterface;
use App\Domain\Prize\TypeRandomizer;
use PHPUnit\Framework\TestCase;

class TypeRandomizerTest extends TestCase
{
    private const TYPE = 'type';

    public function testProvide(): void
    {
        $prizesTypes = ['type1', 'type2'];

        $configuration = $this->createMock(ConfigurationInterface::class);
        $configuration
            ->method('getPrizeTypes')
            ->willReturn($prizesTypes);

        $itemRandomizer = $this->createMock(ItemRandomizerInterface::class);
        $itemRandomizer
            ->method('provide')
            ->with($prizesTypes)
            ->willReturn(self::TYPE);

        $randomizer = new TypeRandomizer($configuration, $itemRandomizer);

        $type = $randomizer->provide();

        $this->assertSame(self::TYPE, $type);
    }
}
