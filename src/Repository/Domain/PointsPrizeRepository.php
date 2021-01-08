<?php

namespace App\Repository\Domain;

use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Repository\Interfaces\PointsPrizeRepositoryInterface;
use App\Factory\PointsFactory;
use App\Factory\PrizeFactory;
use App\Repository\PointsRepository;
use App\Repository\PrizeRepository;
use App\Repository\UserRepository;

class PointsPrizeRepository implements PointsPrizeRepositoryInterface
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
     * @var PointsFactory
     */
    private PointsFactory $pointsFactory;

    /**
     * @var PointsRepository
     */
    private PointsRepository $pointsRepository;

    public function __construct(
        UserRepository $userRepository,
        PrizeFactory $prizeFactory,
        PrizeRepository $prizeRepository,
        PointsFactory $pointsFactory,
        PointsRepository $pointsRepository
    ) {
        $this->userRepository = $userRepository;
        $this->prizeFactory = $prizeFactory;
        $this->prizeRepository = $prizeRepository;
        $this->pointsFactory = $pointsFactory;
        $this->pointsRepository = $pointsRepository;
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
        list('sum' => $sum) = $prize->getStructure()->getParameters();

        $pointsEntity = $this->pointsFactory->create($prizeEntity, $sum);

        $this->pointsRepository->store($pointsEntity);
    }
}
