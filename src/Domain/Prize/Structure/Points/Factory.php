<?php

namespace App\Domain\Prize\Structure\Points;

use App\Domain\Prize\Structure\Points\Interfaces\PointsFactoryInterface;

class Factory implements PointsFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $sum): Points
    {
        return new Points($sum);
    }
}
