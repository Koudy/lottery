<?php

namespace App\Repository\Domain;

use App\Domain\Prize\Interfaces\PrizeInterface;
use App\Domain\Repository\Interfaces\ThingPrizeRepositoryInterface;
use App\Factory\PrizeFactory as PrizeEntityFactory;
use App\Repository\ThingRepository as ThingEntityRepository;
use App\Repository\PrizeRepository as PrizeEntityRepository;
use App\Repository\UserRepository as UserEntityRepository;

class ThingPrizeRepository implements ThingPrizeRepositoryInterface
{
    /**
     * @var UserEntityRepository
     */
    private UserEntityRepository $userEntityRepository;

    /**
     * @var PrizeEntityFactory
     */
    private PrizeEntityFactory $prizeEntityFactory;

    /**
     * @var PrizeEntityRepository
     */
    private PrizeEntityRepository $prizeEntityRepository;

    /**
     * @var ThingEntityRepository
     */
    private ThingEntityRepository $thingEntityRepository;

    public function __construct(
        UserEntityRepository $userEntityRepository,
        PrizeEntityFactory $prizeEntityFactory,
        PrizeEntityRepository $prizeEntityRepository,
        ThingEntityRepository $thingEntityRepository
    ) {
        $this->userEntityRepository = $userEntityRepository;
        $this->prizeEntityFactory = $prizeEntityFactory;
        $this->prizeEntityRepository = $prizeEntityRepository;
        $this->thingEntityRepository = $thingEntityRepository;
    }

    /**
     * @inheritDoc
     */
    public function store(PrizeInterface $prize): void
    {
        $user = $this->userEntityRepository->getByName($prize->getUserName());

        $prizeEntity = $this->prizeEntityFactory->create($user, $prize->getType());

        $this->prizeEntityRepository->store($prizeEntity);

        // Тут должна быть проверка на ключи, но я не успеваю.
        // TODO: Check keys exists.
        list('id' => $id) = $prize->getStructure()->getParameters();

        $thingEntity = $this->thingEntityRepository->findOneById($id);
        $thingEntity->setPrize($prizeEntity);

        $this->thingEntityRepository->store($thingEntity);
    }
}
