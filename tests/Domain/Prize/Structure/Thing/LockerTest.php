<?php

namespace App\Tests\Domain\Prize\Structure\Thing;

use App\Domain\Prize\Structure\Thing\Locker;
use PHPUnit\Framework\TestCase;

class LockerTest extends TestCase
{
    private const ID = 1;

    public function testLock(): void
    {
        $locker = new Locker();

        $locker->lock(self::ID);
    }
}
