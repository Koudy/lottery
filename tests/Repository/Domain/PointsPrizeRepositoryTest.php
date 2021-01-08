<?php

namespace App\Tests\Repository\Domain;

use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;
use App\Entity\Points;
use App\Entity\Prize;
use App\Entity\User;
use App\Factory\PointsFactory;
use App\Factory\PrizeFactory;
use App\Repository\Domain\PointsPrizeRepository;
use App\Repository\PointsRepository;
use App\Repository\PrizeRepository;
use App\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class PointsPrizeRepositoryTest extends TestCase
{
    private const TYPE = 'type';

    private const USER_NAME = 'Some user name';

    private const SUM = 100;

    public function testStore(): void
    {
        $parameters = ['sum' => self::SUM];

        $structure = $this->createMock(PrizeStructureInterface::class);
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

        $pointsEntity = $this->createMock(Points::class);

        $pointsEntityFactory = $this->createMock(PointsFactory::class);
        $pointsEntityFactory
            ->method('create')
            ->with($prizeEntity, self::SUM)
            ->willReturn($pointsEntity);

        $pointsRepository = $this->createMock(PointsRepository::class);
        $pointsRepository
            ->expects(self::once())
            ->method('store')
            ->with($pointsEntity);

        $repository = new PointsPrizeRepository(
            $userRepository,
            $prizeEntityFactory,
            $prizeRepository,
            $pointsEntityFactory,
            $pointsRepository
        );

        $repository->store($prize);
    }
}
