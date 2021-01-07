<?php

namespace App\Domain\Prize\Structure\Interfaces;

interface PrizeStructureInterface
{
    /**
     * @return array
     */
    public function getParameters(): array;

    /**
     * @return string
     */
    public function getDescription(): string;
}
