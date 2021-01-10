<?php

namespace App\Domain\Prize\Interfaces;

use App\Domain\Prize\Exception\NotAvailableException;

interface CreatorInterface
{
    /**
     * @param string $type
     * @param string $userName
     *
     * @return PrizeInterface
     *
     * @throws NotAvailableException
     */
    public function create(
        string $type,
        string $userName
    ): PrizeInterface;
}
