<?php

namespace App\Tests\Domain\Prize;

use App\Domain\Prize\Interfaces\FactoryInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Creator;
use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;
use PHPUnit\Framework\TestCase;

class CreatorTest extends TestCase
{
    private const PRICE_TYPE = 'prize type';

    private const USER_NAME = 'Some unique user name';

    public function testCreate(): void
    {
        $structure = $this->createMock(PrizeStructureInterface::class);

        $structureGenerator = $this->createMock(GeneratorInterface::class);
        $structureGenerator
            ->method('generate')
            ->willReturn($structure);

        $prize = $this->createMock(PrizeInterface::class);

        $prizeFactory = $this->createMock(FactoryInterface::class);
        $prizeFactory
            ->method('create')
            ->with(self::PRICE_TYPE, self::USER_NAME, $structure)
            ->willReturn($prize);

        $prizeCreator = new Creator($prizeFactory);

        $this->assertSame(
            $prize,
            $prizeCreator->create(
                self::PRICE_TYPE,
                self::USER_NAME, $structureGenerator
            )
        );
    }
}