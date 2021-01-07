<?php

namespace App\Tests\Domain\Prize\Structure;

use App\Domain\Prize\Structure\MoneyFactory;
use Monolog\Test\TestCase;

class MoneyFactoryTest extends TestCase
{
    private const SUM = 100;

    private const CURRENCY = 'currency';

    public function testCreate(): void
    {
        $factory = new MoneyFactory();

        $structure = $factory->create(self::SUM, self::CURRENCY);

        $expectedParameters = [
            'sum' => self::SUM,
            'currency' => self::CURRENCY
        ];

        $this->assertSame($expectedParameters, $structure->getParameters());
    }
}
