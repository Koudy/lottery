<?php

namespace App\Tests\Repository\Domain;

use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Structure\Interfaces\StructureInterface;
use App\Entity\Thing;
use App\Entity\Prize;
use App\Entity\User;
use App\Factory\PrizeFactory;
use App\Repository\Domain\ThingPrizeRepository;
use App\Repository\ThingRepository as ThingEntityRepository;
use App\Repository\PrizeRepository;
use App\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class ThingPrizeRepositoryTest extends TestCase
{
    private const TYPE = 'type';

    private const USER_NAME = 'Some user name';

    private const ID = 1;

    public function testStore(): void
    {
        $parameters = [
            'id' => self::ID,
        ];

        $structure = $this->createMock(StructureInterface::class);
        $structure
            ->method('getParameters')
            ->willReturn($parameters);

        $prize = $this->createMock(PrizeInterface::class);

        $prize
            ->method('getType')
            ->willReturn(self::TYPE);

        $prize
            ->method('getUserName')
            ->willReturn(self::USER_NAME);

        $prize
            ->method('getStructure')
            ->willReturn($structure);

        $user = $this->createMock(User::class);

        $userRepository = $this->createMock(UserRepository::class);
        $userRepository
            ->method('getByName')
            ->with(self::USER_NAME)
            ->willReturn($user);

        $prizeEntity = $this->createMock(Prize::class);

        $prizeEntityFactory = $this->createMock(PrizeFactory::class);
        $prizeEntityFactory
            ->method('create')
            ->with($user, self::TYPE)
            ->willReturn($prizeEntity);

        $prizeRepository = $this->createMock(PrizeRepository::class);
        $prizeRepository
            ->expects(self::once())
            ->method('store')
            ->with($prizeEntity);

        $thingEntity = $this->createMock(Thing::class);
        $thingEntity
            ->expects(self::once())
            ->method('setPrize')
            ->with($prizeEntity);

        $thingEntityRepository = $this->createMock(ThingEntityRepository::class);
        $thingEntityRepository
            ->method('findOneById')
            ->with(self::ID)
            ->willReturn($thingEntity);

        $thingEntityRepository
            ->expects(self::once())
            ->method('store')
            ->with($thingEntity);

        $repository = new ThingPrizeRepository(
            $userRepository,
            $prizeEntityFactory,
            $prizeRepository,
            $thingEntityRepository
        );

        $repository->store($prize);
    }
}
