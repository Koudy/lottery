<?php

namespace App\Domain\Repository\Interfaces;

use App\Domain\Prize\Structure\Thing;

interface ThingRepositoryInterface
{
    /**
     * @param string $name
     * @return Thing
     */
    public function findOneByName(string $name): Thing;

    /**
     * @return array
     */
    public function getUniqueNamesWithEmptyPrizeId(): array;
}
