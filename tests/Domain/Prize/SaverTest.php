<?php

namespace App\Tests\Domain\Prize;

use App\Domain\Factory\Interfaces\FactoriesSelectorInterface;
use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Saver;
use App\Domain\Repository\Interfaces\PrizeRepositoryInterface;
use PHPUnit\Framework\TestCase;

class SaverTest extends TestCase
{
    private const PRICE_TYPE = 'type';

    public function testSave(): void
    {
        $prize = $this->createMock(PrizeInterface::class);
        $prize
            ->method('getType')
            ->willReturn(self::PRICE_TYPE);

        $prizeRepository = $this->createMock(PrizeRepositoryInterface::class);
        $prizeRepository
            ->expects(self::once())
            ->method('store')
            ->with($prize);

        $factory = $this->createMock(FactoryInterface::class);
        $factory
            ->method('getRepository')
            ->willReturn($prizeRepository);

        $factoriesSelector = $this->createMock(FactoriesSelectorInterface::class);
        $factoriesSelector
            ->method('select')
            ->with(self::PRICE_TYPE)
            ->willReturn($factory);

        $saver = new Saver($factoriesSelector);
        $saver->save($prize);
    }
}
