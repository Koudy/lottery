<?php

namespace App\Domain\Prize\Structure\Interfaces;

interface ThingNamesProviderInterface
{
    /**
     * @return array
     */
    public function provide(): array;
}
