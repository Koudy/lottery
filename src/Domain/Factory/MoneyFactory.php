<?php

namespace App\Domain\Factory;

use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;
use App\Domain\Prize\Structure\MoneyGenerator;
use App\Domain\Repository\MoneyPrizeRepository;
use App\Domain\Repository\Interfaces\PrizeRepositoryInterface;

class MoneyFactory implements FactoryInterface
{
    /**
     * @var MoneyGenerator
     */
    private MoneyGenerator $moneyStructureGenerator;

    /**
     * @var MoneyPrizeRepository
     */
    private MoneyPrizeRepository $moneyPrizeRepository;

    /**
     * @param MoneyGenerator $structureGenerator
     * @param MoneyPrizeRepository $moneyPrizeRepository
     */
    public function __construct(
        MoneyGenerator $structureGenerator,
        MoneyPrizeRepository $moneyPrizeRepository
    )
    {
        $this->moneyStructureGenerator = $structureGenerator;
        $this->moneyPrizeRepository = $moneyPrizeRepository;
    }

    /**
     * @inheritDoc
     */
    public function getStructureGenerator(): GeneratorInterface
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
