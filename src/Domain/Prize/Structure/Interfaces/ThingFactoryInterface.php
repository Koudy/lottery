<?php

namespace App\Domain\Prize\Structure\Interfaces;

use App\Domain\Prize\Structure\Thing\Thing;

interface ThingFactoryInterface
{
    /**
     * @param int $id
     * @param string $name
     * @return Thing
     */
    public function create(int $id, string $name): Thing;
}
