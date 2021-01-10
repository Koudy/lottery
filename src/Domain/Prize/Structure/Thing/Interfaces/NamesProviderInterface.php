<?php

namespace App\Domain\Prize\Structure\Thing\Interfaces;

interface NamesProviderInterface
{
    /**
     * @return array
     */
    public function provide(): array;
}
