<?php

namespace App\Domain\Prize\Structure\Interfaces;

use App\Domain\Prize\Structure\Points;

interface PointsFactoryInterface
{
    /**
     * @param int $sum
s     * @return Points
     */
    public function create(int $sum): Points;
}
