<?php

namespace App\Domain\Prize;

use App\Domain\Factory\Interfaces\FactoriesSelectorInterface;
use App\Domain\Prize\Interfaces\CreatorInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Prize\Interfaces\SaverInterface;
use App\Domain\Prize\Interfaces\TypeRandomizerInterface;

class Saver implements SaverInterface
{
    /**
     * @var FactoriesSelectorInterface
     */
    private FactoriesSelectorInterface $factoriesSelector;

    /**
     * @param FactoriesSelectorInterface $factoriesSelector
     */
    public function __construct(FactoriesSelectorInterface $factoriesSelector)
    {
        $this->factoriesSelector = $factoriesSelector;
    }

    /**
     * @inheritDoc
     */
    public function save(PrizeInterface $prize): void
    {
        $factory = $this->factoriesSelector->select($prize->getType());

        $factory->getRepository()->store($prize);
    }
}
