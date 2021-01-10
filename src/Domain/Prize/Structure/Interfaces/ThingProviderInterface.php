<?php

namespace App\Domain\Prize\Structure\Interfaces;

use App\Domain\Prize\Structure\Thing;

interface ThingProviderInterface
{
    /**
     * @param string $name
     * @return Thing
     */
    public function provide(string $name): Thing;
}
