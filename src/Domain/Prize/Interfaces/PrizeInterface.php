<?php

namespace App\Domain\Prize\Interfaces;

use App\Domain\Prize\Structure\Interfaces\PrizeStructureInterface;

interface PrizeInterface
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
     * @return PrizeStructureInterface
     */
    public function getStructure(): PrizeStructureInterface;
}
