<?php

namespace App\Domain\Prize\Interfaces;

use App\Domain\Prize\Exception\PrizeProviderException;

interface ProviderInterface
{
    /**
     * @param string $userName
     * @return PrizeInterface
     *
     * @throws PrizeProviderException
     */
    public function provide(string $userName): PrizeInterface;
}
