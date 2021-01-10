<?php

namespace App\Domain\Prize\Structure\Points;

use App\Domain\Prize\Structure\Interfaces\PointsFactoryInterface;

class PointsFactory implements PointsFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $sum): Points
    {
        return new Points($sum);
    }
}
