<?php

namespace App\Domain\Prize\Structure\Thing\Interfaces;

use App\Domain\Prize\Structure\Thing\Thing;

interface FactoryInterface
{
    /**
     * @param int $id
     * @param string $name
     * @return Thing
     */
    public function create(int $id, string $name): Thing;
}
