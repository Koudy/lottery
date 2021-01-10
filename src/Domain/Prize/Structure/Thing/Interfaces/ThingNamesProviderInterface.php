<?php

namespace App\Domain\Prize\Structure\Thing\Interfaces;

interface ThingNamesProviderInterface
{
    /**
     * @return array
     */
    public function provide(): array;
}
