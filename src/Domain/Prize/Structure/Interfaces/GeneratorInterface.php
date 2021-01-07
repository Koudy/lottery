<?php

namespace App\Domain\Prize\Structure\Interfaces;

interface GeneratorInterface
{
    /**
     * @return PrizeStructureInterface
     */
    public function generate(): PrizeStructureInterface;
}
