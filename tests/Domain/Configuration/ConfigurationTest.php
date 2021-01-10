<?php

namespace App\Tests\Domain\Configuration;

use App\Domain\Configuration\Configuration;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    private const CURRENCY = 'currency';

    private const LIMIT = 100;

    private const PRIZE_PROVIDE_ATTEMPT_COUNT = 10;

    public function testGetPrizeTypes(): void
    {
        $prizeTypes = [
            'type1',
            'type2'
        ];

        $configuration = new Configuration(
            $prizeTypes,
            '',
            0,
            0,
            0
        );

        $this->assertSame($prizeTypes, $configuration->getPrizeTypes());
    }

    public function testGetCurrency(): void
    {
        $configuration = new Configuration(
            [],
            self::CURRENCY,
            0,
            0,
            0
        );

        $this->assertSame(self::CURRENCY, $configuration->getCurrency());
    }

    public function testGetMoneyLimit(): void
    {
        $configuration = new Configuration(
            [],
            '',
            self::LIMIT,
            0,
            0
        );

        $this->assertSame(self::LIMIT, $configuration->getMoneyLimit());
    }

    public function testGetPointsLimit(): void
    {
        $configuration = new Configuration(
            [],
            '',
            0,
            self::LIMIT,
            0);

        $this->assertSame(self::LIMIT, $configuration->getPointsLimit());
    }

    public function testGetPrizeProvideAttemptCount(): void
    {
        $configuration = new Configuration(
            [],
            '',
            0,
            0,
            self::PRIZE_PROVIDE_ATTEMPT_COUNT
        );

        $this->assertSame(
            self::PRIZE_PROVIDE_ATTEMPT_COUNT,
            $configuration->getPrizeProvideAttemptCount()
        );
    }
}
