<?php

namespace App\Tests\Domain\Prize\Structure\Points;

use App\Domain\Prize\Structure\Points\Points;
use PHPUnit\Framework\TestCase;

class PointsTest extends TestCase
{
    private const SUM = 100;

    public function testGetParameters(): void
    {
        $points = new Points(self::SUM);

        $expectedParameters = [
            'sum' => self::SUM,
        ];

        $this->assertSame($expectedParameters, $points->getParameters());
    }

    public function testGetDescription(): void
    {
        $points = new Points(self::SUM);

        $this->assertSame(self::SUM . ' points', $points->getDescription());
    }
}
