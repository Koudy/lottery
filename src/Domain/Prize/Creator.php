<?php

namespace App\Domain\Prize;

use App\Domain\Factory\Interfaces\FactoriesSelectorInterface;
use App\Domain\Prize\Interfaces\FactoryInterface;
use App\Domain\Prize\Interfaces\CreatorInterface;
use App\Domain\Prize\Interfaces\PrizeInterface;

class Creator implements CreatorInterface
{
    /**
     * @var FactoriesSelectorInterface
     */
    private FactoriesSelectorInterface $factoriesSelector;

    /**
     * @var FactoryInterface
     */
    private FactoryInterface $prizeFactory;

    /**
     * @param FactoriesSelectorInterface $factoriesSelector
     * @param FactoryInterface $prizeFactory
     */
    public function __construct(
        FactoriesSelectorInterface $factoriesSelector,
        FactoryInterface $prizeFactory
    )
    {
        $this->factoriesSelector = $factoriesSelector;
        $this->prizeFactory = $prizeFactory;
    }

    /**
     * @inheritDoc
     */
    public function create(
        string $type,
        string $userName
    ): PrizeInterface {
        $factory = $this->factoriesSelector->select($type);

        $structure = $factory->getStructureGenerator()->generate();

        return $this->prizeFactory->create($type, $userName, $structure);
    }
}
