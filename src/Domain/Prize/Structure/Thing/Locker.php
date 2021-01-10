<?php

namespace App\Domain\Prize\Structure\Thing;

use App\Domain\Prize\Structure\Thing\Interfaces\LockerInterface;

class Locker implements LockerInterface
{
    /**
     * @inheritDoc
     */
    public function lock(int $id): void
    {
        // TODO: Implement lock() method.
    }
}
