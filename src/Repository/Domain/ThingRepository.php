<?php

namespace App\Repository\Domain;

use App\Domain\Prize\Structure\Thing\Interfaces\FactoryInterface;
use App\Domain\Prize\Structure\Thing\Thing;
use App\Repository\ThingRepository as ThingEntityRepository;
use App\Domain\Repository\Interfaces\ThingRepositoryInterface;

class ThingRepository implements ThingRepositoryInterface
{
    /**
     * @var ThingEntityRepository
     */
    private ThingEntityRepository $thingEntityRepository;

    /**
     * @var FactoryInterface
     */
    private FactoryInterface $thingFactory;

    /**
     * @param ThingEntityRepository $thingEntityRepository
     * @param FactoryInterface $thingFactory
     */
    public function __construct(
        ThingEntityRepository $thingEntityRepository,
        FactoryInterface $thingFactory
    ) {
        $this->thingEntityRepository = $thingEntityRepository;
        $this->thingFactory = $thingFactory;
    }

    /**
     * @inheritDoc
     */
    public function findOneByName(string $name): Thing
    {
        $thingEntity = $this->thingEntityRepository->findOneByName($name);

        return $this->thingFactory->create($thingEntity->getId(), $name);
    }

    /**
     * @inheritDoc
     */
    public function getUniqueNamesWithEmptyPrizeId(): array
    {
        return $this->thingEntityRepository->getUniqueNamesWithEmptyPrizeId();
    }
}
