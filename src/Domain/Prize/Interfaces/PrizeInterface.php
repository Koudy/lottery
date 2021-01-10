<?php

namespace App\Domain\Prize\Interfaces;

use App\Domain\Prize\Structure\Interfaces\StructureInterface;

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
     * @return StructureInterface
     */
    public function getStructure(): StructureInterface;
}
