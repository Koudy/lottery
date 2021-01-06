<?php

namespace App\Domain\Generator;

use App\Domain\Generator\Interfaces\ItemRandomizerInterface;

class ItemRandomizer implements ItemRandomizerInterface
{
    /**
     * @inheritDoc
     */
    public function provide(array $items): string
    {
        return $items[random_int(0, count($items) - 1)];
    }
}
