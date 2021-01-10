<?php

namespace App\Tests\Domain\Prize\Structure;

use App\Domain\Prize\Structure\Thing;
use PHPUnit\Framework\TestCase;

class ThingTest extends TestCase
{
    private const ID = 1;

    private const NAME = 'name';

    public function testGetParameters(): void
    {
        $thing = new Thing(self::ID, self::NAME);

        $expectedParameters = [
            'id' => self::ID,
            'name' => self::NAME
        ];

        $this->assertSame($expectedParameters, $thing->getParameters());
    }

    public function testGetDescription(): void
    {
        $thing = new Thing(self::ID, self::NAME);

        $this->assertSame(self::NAME, $thing->getDescription());
    }

    public function testGetId(): void
    {
        $thing = new Thing(self::ID, self::NAME);

        $this->assertSame(self::ID, $thing->getId());
    }
}
