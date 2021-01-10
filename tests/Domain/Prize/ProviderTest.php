<?php

namespace App\Tests\Domain\Prize;

use App\Domain\Configuration\ConfigurationInterface;
use App\Domain\Generator\Interfaces\ItemRandomizerInterface;
use App\Domain\Prize\Exception\NotAvailableException;
use App\Domain\Prize\Exception\PrizeProviderException;
use App\Domain\Prize\Interfaces\CreatorInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Provider;
use PHPUnit\Framework\TestCase;

class ProviderTest extends TestCase
{
    private const USER_NAME = 'Some user name';

    private const TYPE_1 = 'type 1';

    private const TYPE_2 = 'type 2';

    private const PRIZE_PROVIDE_ATTEMPT_COUNT = 3;

    public function testProvide(): void
    {
        $prizeTypes = [self::TYPE_1, self::TYPE_2];

        $configuration = $this->createMock(ConfigurationInterface::class);
        $configuration
            ->method('getPrizeTypes')
            ->willReturn($prizeTypes);

        $configuration
            ->method('getPrizeProvideAttemptCount')
            ->willReturn(self::PRIZE_PROVIDE_ATTEMPT_COUNT);

        $itemRandomizer = $this->createMock(ItemRandomizerInterface::class);
        $itemRandomizer
            ->method('provide')
            ->with($prizeTypes)
            ->willReturnOnConsecutiveCalls(self::TYPE_2, self::TYPE_1);

        $prize = $this->createMock(PrizeInterface::class);

        $prizeCreator = $this->createMock(CreatorInterface::class);
        $prizeCreator
            ->method('create')
            ->withConsecutive([self::TYPE_2, self::USER_NAME], [self::TYPE_1, self::USER_NAME])
            ->willReturnOnConsecutiveCalls(
                $this->throwException(new NotAvailableException(
                        'Prize ' . self::TYPE_2. 'is not available')
                ),
                $prize
            );

        $provider = new Provider($configuration, $itemRandomizer, $prizeCreator);

        $this->assertSame($prize, $provider->provide(self::USER_NAME));
    }

    public function testProvideWhenNotAvailable(): void
    {
        $prizeTypes = [self::TYPE_1];

        $configuration = $this->createMock(ConfigurationInterface::class);
        $configuration
            ->method('getPrizeTypes')
            ->willReturn($prizeTypes);

        $configuration
            ->method('getPrizeProvideAttemptCount')
            ->willReturn(self::PRIZE_PROVIDE_ATTEMPT_COUNT);

        $itemRandomizer = $this->createMock(ItemRandomizerInterface::class);
        $itemRandomizer
            ->method('provide')
            ->with($prizeTypes)
            ->willReturn(self::TYPE_1);

        $prizeCreator = $this->createMock(CreatorInterface::class);
        $prizeCreator
            ->method('create')
            ->with(self::TYPE_1, self::USER_NAME)
            ->willThrowException(new NotAvailableException());

        $provider = new Provider($configuration, $itemRandomizer, $prizeCreator);

        $this->expectException(PrizeProviderException::class);
        $this->expectExceptionMessage('Can\'t provide prize');

        $provider->provide(self::USER_NAME);
    }
}
