<?php

namespace App\Tests\Domain\Prize;

use App\Domain\Factory\Interfaces\FactoriesSelectorInterface;
use App\Domain\Prize\Interfaces\FactoryInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Creator;
use App\Domain\Prize\Structure\Interfaces\StructureInterface;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;
use PHPUnit\Framework\TestCase;

class CreatorTest extends TestCase
{
    private const PRICE_TYPE = 'prize type';

    private const USER_NAME = 'Some unique user name';

    public function testCreate(): void
    {
        $structure = $this->createMock(StructureInterface::class);

        $structureGenerator = $this->createMock(GeneratorInterface::class);
        $structureGenerator
            ->method('generate')
            ->willReturn($structure);

        $factory = $this->createMock(\App\Domain\Factory\Interfaces\FactoryInterface::class);
        $factory
            ->method('getStructureGenerator')
            ->willReturn($structureGenerator);

        $factoriesSelector = $this->createMock(FactoriesSelectorInterface::class);
        $factoriesSelector
            ->method('select')
            ->with(self::PRICE_TYPE)
            ->willReturn($factory);

        $prize = $this->createMock(PrizeInterface::class);

        $prizeFactory = $this->createMock(FactoryInterface::class);
        $prizeFactory
            ->method('create')
            ->with(self::PRICE_TYPE, self::USER_NAME, $structure)
            ->willReturn($prize);

        $prizeCreator = new Creator($factoriesSelector, $prizeFactory);

        $this->assertSame(
            $prize,
            $prizeCreator->create(
                self::PRICE_TYPE,
                self::USER_NAME
            )
        );
    }
}
