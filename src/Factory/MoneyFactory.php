<?php

namespace App\Factory;

use App\Entity\Money;
use App\Entity\Prize;

class MoneyFactory
{
    /**
     * @param Prize $prize
     * @param int $sum
     * @param string $currency
     * @return Money
     */
    public function create(Prize $prize, int $sum, string $currency): Money
    {
        return (new Money())
            ->setPrize($prize)
            ->setSum($sum)
            ->setCurrency($currency);
    }
}
