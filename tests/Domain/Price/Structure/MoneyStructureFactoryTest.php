<?php

namespace App\Tests\Domain\Price\Structure;

use App\Domain\Price\Structure\MoneyStructureFactory;
use Monolog\Test\TestCase;

class MoneyStructureFactoryTest extends TestCase
{
    private const SUM = 100;

    private const CURRENCY = 'currency';

    public function testCreate(): void
    {
        $factory = new MoneyStructureFactory();

        $structure = $factory->create(self::SUM, self::CURRENCY);

        $this->assertSame(self::SUM, $structure->getSum());
        $this->assertSame(self::CURRENCY, $structure->getCurrency());
    }
}
