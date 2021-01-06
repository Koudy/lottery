<?php

namespace App\Domain\Factory;

use App\Domain\Factory\Interfaces\FactoryInterface;
use App\Domain\Price\Interfaces\StructureGeneratorInterface;
use App\Domain\Price\Structure\MoneyStructureGenerator;
use App\Domain\Repository\MoneyPriceRepository;
use App\Domain\Repository\Interfaces\PriceRepositoryInterface;

class MoneyFactory implements FactoryInterface
{
    /**
     * @var MoneyStructureGenerator
     */
    private MoneyStructureGenerator $moneyStructureGenerator;

    /**
     * @var MoneyPriceRepository
     */
    private MoneyPriceRepository $moneyPriceRepository;

    /**
     * @param MoneyStructureGenerator $structureGenerator
     * @param MoneyPriceRepository $moneyPriceRepository
     */
    public function __construct(
        MoneyStructureGenerator $structureGenerator,
        MoneyPriceRepository $moneyPriceRepository
    )
    {
        $this->moneyStructureGenerator = $structureGenerator;
        $this->moneyPriceRepository = $moneyPriceRepository;
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
    public function getRepository(): PriceRepositoryInterface
    {
        return $this->moneyPriceRepository;
    }
}
