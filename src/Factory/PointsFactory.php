<?php

namespace App\Factory;

use App\Entity\Points;
use App\Entity\Prize;

class PointsFactory
{
    /**
     * @param Prize $prize
     * @param int $sum
     * @return Points
     */
    public function create(Prize $prize, int $sum): Points
    {
        return (new Points())
            ->setPrize($prize)
            ->setSum($sum);
    }
}
