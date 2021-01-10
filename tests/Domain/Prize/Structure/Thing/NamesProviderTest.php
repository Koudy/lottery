<?php

namespace App\Tests\Domain\Prize\Structure\Thing;

use App\Domain\Prize\Structure\Thing\NamesProvider;
use App\Domain\Repository\Interfaces\ThingRepositoryInterface;
use PHPUnit\Framework\TestCase;

class NamesProviderTest extends TestCase
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

        $provider = new NamesProvider($thingRepository);

        $this->assertSame($names, $provider->provide());
    }
}
