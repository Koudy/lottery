<?php

namespace App\Repository\Domain;

use App\Domain\Prize\Structure\Interfaces\ThingFactoryInterface;
use App\Domain\Prize\Structure\Thing;
use App\Repository\ThingRepository as ThingEntityRepository;
use App\Domain\Repository\Interfaces\ThingRepositoryInterface;

class ThingRepository implements ThingRepositoryInterface
{
    /**
     * @var ThingEntityRepository
     */
    private ThingEntityRepository $thingEntityRepository;

    /**
     * @var ThingFactoryInterface
     */
    private ThingFactoryInterface $thingFactory;

    /**
     * @param ThingEntityRepository $thingEntityRepository
     * @param ThingFactoryInterface $thingFactory
     */
    public function __construct(
        ThingEntityRepository $thingEntityRepository,
        ThingFactoryInterface $thingFactory
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
