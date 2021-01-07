<?php

namespace App\Domain\Factory;

use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Prize\Structure\Interfaces\GeneratorInterface;
use App\Domain\Prize\Structure\MoneyGenerator;
use App\Domain\Repository\Interfaces\MoneyPrizeRepositoryInterface;
use App\Domain\Repository\Interfaces\PrizeRepositoryInterface;

class MoneyFactory implements FactoryInterface
{
    /**
     * @var MoneyGenerator
     */
    private MoneyGenerator $moneyStructureGenerator;

    /**
     * @var MoneyPrizeRepositoryInterface
     */
    private MoneyPrizeRepositoryInterface $moneyPrizeRepository;

    /**
     * @param MoneyGenerator $structureGenerator
     * @param MoneyPrizeRepositoryInterface $moneyPrizeRepository
     */
    public function __construct(
        MoneyGenerator $structureGenerator,
        MoneyPrizeRepositoryInterface $moneyPrizeRepository
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
