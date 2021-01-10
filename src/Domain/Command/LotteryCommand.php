<?php

namespace App\Domain\Command;

use App\Domain\Command\Context\Interfaces\LotteryContextInterface;
use App\Domain\Prize\Interfaces\CreatorInterface;
use App\Domain\Prize\Interfaces\ProviderInterface;
use App\Domain\Prize\Interfaces\SaverInterface;

class LotteryCommand
{
    /**
     * @var ProviderInterface
     */
    private ProviderInterface $prizeProvider;

    /**
     * @var SaverInterface
     */
    private SaverInterface $prizeSaver;

    /**
     * @var CreatorInterface
     */
    private CreatorInterface $prizeCreator;

    public function __construct(
        ProviderInterface $prizeProvider,
        SaverInterface $factoriesSelector
    ) {
        $this->prizeProvider = $prizeProvider;
        $this->prizeSaver = $factoriesSelector;
    }

    /**
     * @param LotteryContextInterface $context
     */
    public function execute(LotteryContextInterface $context): void
    {
        $prize = $this->prizeProvider->provide($context->getUserName());

        $this->prizeSaver->save($prize);

        $context->setPrize($prize);
    }
}
