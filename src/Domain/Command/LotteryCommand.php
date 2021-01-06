<?php

namespace App\Domain\Command;

use App\Domain\Command\Context\Interfaces\LotteryContextInterface;
use App\Domain\Factory\Interfaces\FactoriesSelectorInterface;
use App\Domain\Price\Interfaces\PriceCreatorInterface;
use App\Domain\Price\Interfaces\TypeRandomizerInterface;

class LotteryCommand
{
    /**
     * @var TypeRandomizerInterface
     */
    private TypeRandomizerInterface $priceTypeRandomizer;

    /**
     * @var FactoriesSelectorInterface
     */
    private FactoriesSelectorInterface $factoriesSelector;

    /**
     * @var PriceCreatorInterface
     */
    private PriceCreatorInterface $priceCreator;

    public function __construct(
        TypeRandomizerInterface $typeRandomizer,
        FactoriesSelectorInterface $factoriesSelector,
        PriceCreatorInterface $priceCreator
    ) {
        $this->priceTypeRandomizer = $typeRandomizer;
        $this->factoriesSelector = $factoriesSelector;
        $this->priceCreator = $priceCreator;
    }

    /**
     * @param LotteryContextInterface $context
     */
    public function execute(LotteryContextInterface $context): void
    {
        $priceType = $this->priceTypeRandomizer->provide();

        $factory = $this->factoriesSelector->select($priceType);

        $price = $this->priceCreator->create(
            $priceType,
            $context->getUserName(),
            $factory->getStructureGenerator()
        );

        $factory->getRepository()->store($price);

        $context->setPrice($price);
    }
}
