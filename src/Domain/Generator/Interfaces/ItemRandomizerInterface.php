<?php

namespace App\Domain\Generator\Interfaces;

interface ItemRandomizerInterface
{
    /**
     * @param array $items
     * @return string
     */
    public function provide(array $items): string;
}
