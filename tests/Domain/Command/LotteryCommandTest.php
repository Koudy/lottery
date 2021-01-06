<?php

namespace App\Tests\Domain\Command;

use App\Domain\Command\Context\Interfaces\LotteryContextInterface;
use App\Domain\Command\LotteryCommand;
use App\Domain\Factory\Interfaces\FactoriesSelectorInterface;
use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Price\Interfaces\PriceCreatorInterface;
use App\Domain\Price\Interfaces\PriceInterface;
use App\Domain\Price\Interfaces\StructureGeneratorInterface;
use App\Domain\Price\Interfaces\TypeRandomizerInterface;
use App\Domain\Repository\Interfaces\PriceRepositoryInterface;
use PHPUnit\Framework\TestCase;

class LotteryCommandTest extends TestCase
{
    private const PRICE_TYPE = 'type';

    private const USER_NAME = 'Some unique user name';

    public function testExecute(): void
    {
        $price = $this->createMock(PriceInterface::class);

        $context = $this->createMock(LotteryContextInterface::class);
        $context
            ->expects(self::once())
            ->method('setPrice')
            ->with($this->identicalTo($price));
        $context
            ->method('getUserName')
            ->willReturn(self::USER_NAME);

        $typeRandomizer = $this->createMock(TypeRandomizerInterface::class);
        $typeRandomizer
            ->method('provide')
            ->willReturn(self::PRICE_TYPE);

        $structureGenerator = $this->createMock(StructureGeneratorInterface::class);

        $priceRepository = $this->createMock(PriceRepositoryInterface::class);
        $priceRepository
            ->expects(self::once())
            ->method('store')
            ->with($price);

        $factory = $this->createMock(FactoryInterface::class);
        $factory
            ->method('getStructureGenerator')
            ->willReturn($structureGenerator);
        $factory
            ->method('getRepository')
            ->willReturn($priceRepository);

        $factoriesSelector = $this->createMock(FactoriesSelectorInterface::class);
        $factoriesSelector
            ->method('select')
            ->with(self::PRICE_TYPE)
            ->willReturn($factory);

        $priceCreator = $this->createMock(PriceCreatorInterface::class);
        $priceCreator
            ->method('create')
            ->with(self::PRICE_TYPE, self::USER_NAME, $structureGenerator)
            ->willReturn($price);

        $command = new LotteryCommand($typeRandomizer, $factoriesSelector, $priceCreator);

        $command->execute($context);
    }
}
