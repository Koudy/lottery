<?php

namespace App\Domain\Factory\Interfaces;

interface FactoriesSelectorInterface
{
    /**
     * @param string $type
     * @return FactoryInterface
     */
    public function select(string $type): FactoryInterface;
}
