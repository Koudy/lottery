<?php

namespace App\Tests\Repository\Domain;

use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;
use App\Entity\Money;
use App\Entity\Prize;
use App\Entity\User;
use App\Factory\MoneyFactory;
use App\Factory\PrizeFactory;
use App\Repository\Domain\MoneyPrizeRepository;
use App\Repository\MoneyRepository;
use App\Repository\PrizeRepository;
use App\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class MoneyPrizeRepositoryTest extends TestCase
{
    private const TYPE = 'type';

    private const USER_NAME = 'Some user name';

    private const SUM = 100;

    private const CURRENCY = 'currency';

    public function testStore(): void
    {
        $parameters = [
            'sum' => self::SUM,
            'currency' => self::CURRENCY
        ];

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

        $moneyEntity = $this->createMock(Money::class);

        $moneyEntityFactory = $this->createMock(MoneyFactory::class);
        $moneyEntityFactory
            ->method('create')
            ->with($prizeEntity, self::SUM, self::CURRENCY)
            ->willReturn($moneyEntity);

        $moneyRepository = $this->createMock(MoneyRepository::class);
        $moneyRepository
            ->expects(self::once())
            ->method('store')
            ->with($moneyEntity);

        $repository = new MoneyPrizeRepository(
            $userRepository,
            $prizeEntityFactory,
            $prizeRepository,
            $moneyEntityFactory,
            $moneyRepository
        );

        $repository->store($prize);
    }
}
