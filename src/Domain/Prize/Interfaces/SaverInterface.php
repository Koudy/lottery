<?php

namespace App\Domain\Prize\Interfaces;

interface SaverInterface
{
    /**
     * @param PrizeInterface $prize
     */
    public function save(PrizeInterface  $prize): void;
}
