<?php

namespace App\Tests\Domain\Prize\Structure\Thing;

use App\Domain\Prize\Structure\Thing\Provider;
use App\Domain\Prize\Structure\Thing\Thing;
use App\Domain\Prize\Structure\Thing\Interfaces\LockerInterface;
use App\Domain\Repository\Interfaces\ThingRepositoryInterface;
use PHPUnit\Framework\TestCase;

class ProviderTest extends TestCase
{
    private const ID = 1;

    private const NAME = 'name';

    public function testProvide(): void
    {
        $thing = $this->createMock(Thing::class);
        $thing
            ->method('getId')
            ->willReturn(self::ID);

        $thingRepository = $this->createMock(ThingRepositoryInterface::class);
        $thingRepository
            ->method('findOneByName')
            ->with(self::NAME)
            ->willReturn($thing);

        $locker = $this->createMock(LockerInterface::class);
        $locker
            ->expects(self::once())
            ->method('lock')
            ->with(self::ID);

        $provider = new Provider($thingRepository, $locker);

        $this->assertSame($thing, $provider->provide(self::NAME));
    }
}
