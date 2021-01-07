<?php

namespace App\Tests\Factory;

use App\Entity\User;
use App\Factory\PrizeFactory;
use PHPUnit\Framework\TestCase;

class PrizeFactoryTest extends TestCase
{
    private const TYPE = 'type';

    public function testCreate():void
    {
        $factory = new PrizeFactory();

        $user = $this->createMock(User::class);

        $prize = $factory->create($user, self::TYPE);

        $this->assertSame($user, $prize->getUser());
        $this->assertSame(self::TYPE, $prize->getType());
    }
}
