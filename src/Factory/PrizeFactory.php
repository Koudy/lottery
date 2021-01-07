<?php

namespace App\Factory;

use App\Entity\Prize;
use App\Entity\User;

class PrizeFactory
{
    /**
     * @param User $user
     * @param string $type
     * @return Prize
     */
    public function create(User $user, string $type): Prize
    {
        return (new Prize())
            ->setUser($user)
            ->setType($type);
    }
}
