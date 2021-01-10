<?php

namespace App\Tests\Domain\Prize\Structure\Thing;

use App\Domain\Prize\Structure\Thing\ThingNamesProvider;
use App\Domain\Repository\Interfaces\ThingRepositoryInterface;
use PHPUnit\Framework\TestCase;

class ThingNamesProviderTest extends TestCase
{
    public function testProvide(): void
    {
        $names = [
            'name1',
            'name2'
        ];

        $thingRepository = $this->createMock(ThingRepositoryInterface::class);
        $thingRepository
            ->method('getUniqueNamesWithEmptyPrizeId')
            ->willReturn($names);

        $provider = new ThingNamesProvider($thingRepository);

        $this->assertSame($names, $provider->provide());
    }
}
