<?php

namespace App\Domain\Factory;

use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Prize\Interfaces\StructureGeneratorInterface;
use App\Domain\Prize\Structure\MoneyStructureGenerator;
use App\Domain\Repository\MoneyPrizeRepository;
use App\Domain\Repository\Interfaces\PrizeRepositoryInterface;

class MoneyFactory implements FactoryInterface
{
    /**
     * @var MoneyStructureGenerator
     */
    private MoneyStructureGenerator $moneyStructureGenerator;

    /**
     * @var MoneyPrizeRepository
     */
    private MoneyPrizeRepository $moneyPrizeRepository;

    /**
     * @param MoneyStructureGenerator $structureGenerator
     * @param MoneyPrizeRepository $moneyPrizeRepository
     */
    public function __construct(
        MoneyStructureGenerator $structureGenerator,
        MoneyPrizeRepository $moneyPrizeRepository
    )
    {
        $this->moneyStructureGenerator = $structureGenerator;
        $this->moneyPrizeRepository = $moneyPrizeRepository;
    }

    /**
     * @inheritDoc
     */
    public function getStructureGenerator(): StructureGeneratorInterface
    {
        return $this->moneyStructureGenerator;
    }

    /**
     * @inheritDoc
     */
    public function getRepository(): PrizeRepositoryInterface
    {
        return $this->moneyPrizeRepository;
    }
}
