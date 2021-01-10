<?php

namespace App\Tests\Domain\Prize\Structure\Money;

use App\Domain\Prize\Structure\Money\Factory;
use Monolog\Test\TestCase;

class FactoryTest extends TestCase
{
    private const SUM = 100;

    private const CURRENCY = 'currency';

    public function testCreate(): void
    {
        $factory = new Factory();

        $structure = $factory->create(self::SUM, self::CURRENCY);

        $expectedParameters = [
            'sum' => self::SUM,
            'currency' => self::CURRENCY
        ];

        $this->assertSame($expectedParameters, $structure->getParameters());
    }
}
