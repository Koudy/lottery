<?php

namespace App\Entity\Interfaces;

use App\Entity\Prize;

interface PrizeFactoryInterface
{
    /**
     * @param string $type
     * @param int $userId
     * @return Prize
     */
    public function create(string $type, int $userId): Prize;
}
