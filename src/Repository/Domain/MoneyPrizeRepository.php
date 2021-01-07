<?php

namespace App\Repository\Domain;

use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Repository\Interfaces\MoneyPrizeRepositoryInterface;
use App\Factory\MoneyFactory;
use App\Factory\PrizeFactory;
use App\Repository\MoneyRepository;
use App\Repository\PrizeRepository;
use App\Repository\UserRepository;

class MoneyPrizeRepository implements MoneyPrizeRepositoryInterface
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * @var PrizeFactory
     */
    private PrizeFactory $prizeFactory;

    /**
     * @var PrizeRepository
     */
    private PrizeRepository $prizeRepository;

    /**
     * @var MoneyFactory
     */
    private MoneyFactory $moneyFactory;

    /**
     * @var MoneyRepository
     */
    private MoneyRepository $moneyRepository;

    public function __construct(
        UserRepository $userRepository,
        PrizeFactory $prizeFactory,
        PrizeRepository $prizeRepository,
        MoneyFactory $moneyFactory,
        MoneyRepository $moneyRepository
    ) {
        $this->userRepository = $userRepository;
        $this->prizeFactory = $prizeFactory;
        $this->prizeRepository = $prizeRepository;
        $this->moneyFactory = $moneyFactory;
        $this->moneyRepository = $moneyRepository;
    }

    /**
     * @inheritDoc
     */
    public function store(PrizeInterface $prize): void
    {
        $user = $this->userRepository->getByName($prize->getUserName());

        $prizeEntity = $this->prizeFactory->create($user, $prize->getType());

        $this->prizeRepository->store($prizeEntity);

        // Тут должна быть проверка на ключи, но я не успеваю.
        // TODO: Check keys exists.
        list('sum' => $sum, 'currency' => $currency) = $prize->getStructure()->getParameters();

        $moneyEntity = $this->moneyFactory->create($prizeEntity, $sum, $currency);

        $this->moneyRepository->store($moneyEntity);
    }
}
