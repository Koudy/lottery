<?php

namespace App\Tests\Domain\Prize\Structure;

use App\Domain\Generator\Interfaces\ItemRandomizerInterface;
use App\Domain\Prize\Exception\NotAvailableException;
use App\Domain\Prize\Structure\Interfaces\ThingNamesProviderInterface;
use App\Domain\Prize\Structure\Interfaces\ThingProviderInterface;
use App\Domain\Prize\Structure\Thing;
use App\Domain\Prize\Structure\ThingGenerator;
use PHPUnit\Framework\TestCase;

class ThingGeneratorTest extends TestCase
{
    private const NAME = 'name1';

    public function testGenerate(): void
    {
        $thingNames = [
            'name1',
            'name2'
        ];

        $thingNamesProvider = $this->createMock(ThingNamesProviderInterface::class);
        $thingNamesProvider
            ->method('provide')
            ->willReturn($thingNames);

        $itemRandomizer = $this->createMock(ItemRandomizerInterface::class);
        $itemRandomizer
            ->method('provide')
            ->with($thingNames)
            ->willReturn(self::NAME);

        $thing = $this->createMock(Thing::class);

        $thingProvider = $this->createMock(ThingProviderInterface::class);
        $thingProvider
            ->method('provide')
            ->with(self::NAME)
            ->willReturn($thing);

        $generator = new ThingGenerator($thingNamesProvider, $itemRandomizer, $thingProvider);

        $this->assertSame($thing, $generator->generate());
    }

    public function testGenerateWhenNoAvailableNames(): void
    {
        $thingNames = [];

        $thingNamesProvider = $this->createMock(ThingNamesProviderInterface::class);
        $thingNamesProvider
            ->method('provide')
            ->willReturn($thingNames);

        $itemRandomizer = $this->createMock(ItemRandomizerInterface::class);

        $thingProvider = $this->createMock(ThingProviderInterface::class);

        $generator = new ThingGenerator($thingNamesProvider, $itemRandomizer, $thingProvider);

        $this->expectException(NotAvailableException::class);
        $this->expectExceptionMessage('No items left');

        $generator->generate();
    }
}
