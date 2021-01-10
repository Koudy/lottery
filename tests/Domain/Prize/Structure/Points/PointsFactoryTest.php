<?php

namespace App\Tests\Domain\Prize\Structure\Points;

use App\Domain\Prize\Structure\Points\PointsFactory;
use Monolog\Test\TestCase;

class PointsFactoryTest extends TestCase
{
    private const SUM = 100;

    public function testCreate(): void
    {
        $factory = new PointsFactory();

        $structure = $factory->create(self::SUM);

        $expectedParameters = [
            'sum' => self::SUM
        ];

        $this->assertSame($expectedParameters, $structure->getParameters());
    }
}
