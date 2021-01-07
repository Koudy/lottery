<?php

namespace App\Domain\Prize\Interfaces;

interface TypeRandomizerInterface
{
    /**
     * @return string
     */
    public function provide(): string;
}
