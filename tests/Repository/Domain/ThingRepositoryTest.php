<?php

namespace App\Tests\Repository\Domain;

use App\Domain\Prize\Structure\Interfaces\ThingFactoryInterface;
use App\Domain\Prize\Structure\Thing\Thing;
use App\Entity\Thing as ThingEntity;
use App\Repository\Domain\ThingRepository;
use App\Repository\ThingRepository as ThingEntityRepository;
use PHPUnit\Framework\TestCase;

class ThingRepositoryTest extends TestCase
{
    private const ID = 1;

    private const NAME = 'name';

    public function testFindOneByName(): void
    {
        $thingEntity = $this->createMock(ThingEntity::class);
        $thingEntity
            ->method('getId')
            ->willReturn(self::ID);

        $thingEntityRepository = $this->createMock(ThingEntityRepository::class);
        $thingEntityRepository
            ->method('findOneByName')
            ->with(self::NAME)
            ->willReturn($thingEntity);

        $thing = $this->createMock(Thing::class);

        $thingFactory = $this->createMock(ThingFactoryInterface::class);
        $thingFactory
            ->method('create')
            ->with(self::ID, self::NAME)
            ->willReturn($thing);

        $thingRepository = new ThingRepository($thingEntityRepository, $thingFactory);

        $this->assertSame($thing, $thingRepository->findOneByName(self::NAME));
    }

    public function testgGetUniqueNamesWithEmptyPrizeId(): void
    {
        $names = [
            'name1',
            'name2',
        ];

        $thingEntityRepository = $this->createMock(ThingEntityRepository::class);
        $thingEntityRepository
            ->method('getUniqueNamesWithEmptyPrizeId')
            ->willReturn($names);

        $thingFactory = $this->createMock(ThingFactoryInterface::class);

        $thingRepository = new ThingRepository($thingEntityRepository, $thingFactory);

        $this->assertSame($names, $thingRepository->getUniqueNamesWithEmptyPrizeId());
    }
}
