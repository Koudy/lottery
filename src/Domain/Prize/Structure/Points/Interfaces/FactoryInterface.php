<?php

namespace App\Domain\Prize\Structure\Points\Interfaces;

use App\Domain\Prize\Structure\Points\Points;

interface FactoryInterface
{
    /**
     * @param int $sum
s     * @return Points
     */
    public function create(int $sum): Points;
}
