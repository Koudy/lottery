<?php

namespace App\Domain\Prize\Structure\Interfaces;

interface StructureInterface
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
