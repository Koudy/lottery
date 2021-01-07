<?php

namespace App\Tests\Domain\Command;

use App\Domain\Command\Context\Interfaces\LotteryContextInterface;
use App\Domain\Command\LotteryCommand;
use App\Domain\Factory\Interfaces\FactoriesSelectorInterface;
use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Prize\Interfaces\CreatorInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Interfaces\TypeRandomizerInterface;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;
use App\Domain\Repository\Interfaces\PrizeRepositoryInterface;
use PHPUnit\Framework\TestCase;

class LotteryCommandTest extends TestCase
{
    private const PRICE_TYPE = 'type';

    private const USER_NAME = 'Some unique user name';

    public function testExecute(): void
    {
        $prize = $this->createMock(PrizeInterface::class);

        $context = $this->createMock(LotteryContextInterface::class);
        $context
            ->expects(self::once())
            ->method('setPrize')
            ->with($this->identicalTo($prize));
        $context
            ->method('getUserName')
            ->willReturn(self::USER_NAME);

        $typeRandomizer = $this->createMock(TypeRandomizerInterface::class);
        $typeRandomizer
            ->method('provide')
            ->willReturn(self::PRICE_TYPE);

        $structureGenerator = $this->createMock(GeneratorInterface::class);

        $prizeRepository = $this->createMock(PrizeRepositoryInterface::class);
        $prizeRepository
            ->expects(self::once())
            ->method('store')
            ->with($prize);

        $factory = $this->createMock(FactoryInterface::class);
        $factory
            ->method('getStructureGenerator')
            ->willReturn($structureGenerator);
        $factory
            ->method('getRepository')
            ->willReturn($prizeRepository);

        $factoriesSelector = $this->createMock(FactoriesSelectorInterface::class);
        $factoriesSelector
            ->method('select')
            ->with(self::PRICE_TYPE)
            ->willReturn($factory);

        $prizeCreator = $this->createMock(CreatorInterface::class);
        $prizeCreator
            ->method('create')
            ->with(self::PRICE_TYPE, self::USER_NAME, $structureGenerator)
            ->willReturn($prize);

        $command = new LotteryCommand($typeRandomizer, $factoriesSelector, $prizeCreator);

        $command->execute($context);
    }
}
