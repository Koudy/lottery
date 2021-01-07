<?php

namespace App\Tests\Domain\Configuration;

use App\Domain\Configuration\Configuration;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    private const CURRENCY = 'currency';

    private const LIMIT = 100;

    public function testGetPrizeTypes(): void
    {
        $prizeTypes = [
            'type1',
            'type2'
        ];

        $configuration = new Configuration($prizeTypes, '', 0);

        $this->assertSame($prizeTypes, $configuration->getPrizeTypes());
    }

    public function testGetCurrency(): void
    {
        $configuration = new Configuration([], self::CURRENCY, '0');

        $this->assertSame(self::CURRENCY, $configuration->getCurrency());
    }

    public function testGetMoneyLimit(): void
    {
        $configuration = new Configuration([], '', self::LIMIT);

        $this->assertSame(self::LIMIT, $configuration->getMoneyLimit());
    }
}
