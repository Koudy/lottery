<?php

namespace App\Domain\Prize\Structure\Points;

use App\Domain\Prize\Structure\Points\Interfaces\FactoryInterface;

class Factory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(int $sum): Points
    {
        return new Points($sum);
    }
}
