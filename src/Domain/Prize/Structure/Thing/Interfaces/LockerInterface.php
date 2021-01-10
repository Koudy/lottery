<?php

namespace App\Domain\Prize\Structure\Thing\Interfaces;

interface LockerInterface
{
    /**
     * @param int $id
     *
     * @throws LockerException
     */
    public function lock(int $id): void;
}
