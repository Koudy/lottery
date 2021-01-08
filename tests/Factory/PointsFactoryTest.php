<?php

namespace App\Tests\Factory;

use App\Entity\Prize;
use App\Factory\PointsFactory;
use PHPUnit\Framework\TestCase;

class PointsFactoryTest extends TestCase
{
    private const SUM = 100;

    public function testCreate():void
    {
        $factory = new PointsFactory();

        $prize = $this->createMock(Prize::class);

        $points = $factory->create($prize, self::SUM);

        $this->assertSame($prize, $points->getPrize());
        $this->assertSame(self::SUM, $points->getSum());
    }
}
