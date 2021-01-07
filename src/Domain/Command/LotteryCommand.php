<?php

namespace App\Domain\Command;

use App\Domain\Command\Context\Interfaces\LotteryContextInterface;
use App\Domain\Factory\Interfaces\FactoriesSelectorInterface;
use App\Domain\Prize\Interfaces\PrizeCreatorInterface;
use App\Domain\Prize\Interfaces\TypeRandomizerInterface;

class LotteryCommand
{
    /**
     * @var TypeRandomizerInterface
     */
    private TypeRandomizerInterface $prizeTypeRandomizer;

    /**
     * @var FactoriesSelectorInterface
     */
    private FactoriesSelectorInterface $factoriesSelector;

    /**
     * @var PrizeCreatorInterface
     */
    private PrizeCreatorInterface $prizeCreator;

    public function __construct(
        TypeRandomizerInterface $typeRandomizer,
        FactoriesSelectorInterface $factoriesSelector,
        PrizeCreatorInterface $prizeCreator
    ) {
        $this->prizeTypeRandomizer = $typeRandomizer;
        $this->factoriesSelector = $factoriesSelector;
        $this->prizeCreator = $prizeCreator;
    }

    /**
     * @param LotteryContextInterface $context
     */
    public function execute(LotteryContextInterface $context): void
    {
        $prizeType = $this->prizeTypeRandomizer->provide();

        $factory = $this->factoriesSelector->select($prizeType);

        $prize = $this->prizeCreator->create(
            $prizeType,
            $context->getUserName(),
            $factory->getStructureGenerator()
        );

        $factory->getRepository()->store($prize);

        $context->setPrize($prize);
    }
}
