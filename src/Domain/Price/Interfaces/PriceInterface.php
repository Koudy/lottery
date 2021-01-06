<?php

namespace App\Domain\Price\Interfaces;

interface PriceInterface
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return string
     */
    public function getUserName(): string;

    /**
     * @return PriceStructureInterface
     */
    public function getStructure(): PriceStructureInterface;
}
