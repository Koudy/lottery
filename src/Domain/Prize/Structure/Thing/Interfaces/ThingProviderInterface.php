<?php

namespace App\Domain\Prize\Structure\Thing\Interfaces;

use App\Domain\Prize\Structure\Thing\Thing;

interface ThingProviderInterface
{
    /**
     * @param string $name
     * @return Thing
     */
    public function provide(string $name): Thing;
}
