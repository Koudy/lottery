<?php

namespace App\Tests\Domain\Prize\Structure\Thing;

use App\Domain\Prize\Structure\Thing\Factory;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    private const ID = 1;

    private const NAME = 'name';

    public function testCreate(): void
    {
        $factory = new Factory();

        $thing = $factory->create(self::ID, self::NAME);

        $expectedParameters = [
            'id' => self::ID,
            'name' => self::NAME,
        ];

        $this->assertSame($expectedParameters, $thing->getParameters());
        $this->assertSame(self::ID, $thing->getId());
    }
}
