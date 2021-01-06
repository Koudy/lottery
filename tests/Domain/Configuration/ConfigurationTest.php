<?php

namespace App\Tests\Domain\Configuration;

use App\Domain\Configuration\Configuration;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    private const CURRENCY = 'currency';

    private const LIMIT = 100;

    public function testGetPriceTypes(): void
    {
        $priceTypes = [
            'type1',
            'type2'
        ];

        $configuration = new Configuration($priceTypes, '', 0);

        $this->assertSame($priceTypes, $configuration->getPriceTypes());
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
