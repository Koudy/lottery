<?php

namespace App\Tests\Domain\Command;

use App\Domain\Command\Context\Interfaces\LotteryContextInterface;
use App\Domain\Command\LotteryCommand;
use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Interfaces\ProviderInterface;
use App\Domain\Prize\Interfaces\SaverInterface;
use PHPUnit\Framework\TestCase;

class LotteryCommandTest extends TestCase
{
    private const USER_NAME = 'Some unique user name';

    public function testExecute(): void
    {
        $prize = $this->createMock(PrizeInterface::class);

        $context = $this->createMock(LotteryContextInterface::class);
        $context
            ->method('getUserName')
            ->willReturn(self::USER_NAME);

        $context
            ->expects(self::once())
            ->method('setPrize')
            ->with($this->identicalTo($prize));

        $prizeProvider = $this->createMock(ProviderInterface::class);
        $prizeProvider
            ->method('provide')
            ->with(self::USER_NAME)
            ->willReturn($prize);

        $prizeSaver = $this->createMock(SaverInterface::class);
        $prizeSaver
            ->expects(self::once())
            ->method('save')
            ->with($prize);

        $command = new LotteryCommand($prizeProvider, $prizeSaver);
        $command->execute($context);
    }
}
