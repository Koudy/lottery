<?php

namespace App\Domain\Price\Interfaces;

interface TypeRandomizerInterface
{
    /**
     * @return string
     */
    public function provide(): string;
}
