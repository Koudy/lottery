<?php

namespace App\Domain\Prize\Structure\Thing;

use App\Domain\Prize\Structure\Thing\Interfaces\ThingProviderInterface;
use App\Domain\Prize\Structure\Thing\Interfaces\LockerInterface;
use App\Domain\Repository\Interfaces\ThingRepositoryInterface;

class Provider implements ThingProviderInterface
{
    /**
     * @var ThingRepositoryInterface
     */
    private ThingRepositoryInterface $thingRepository;

    /**
     * @var LockerInterface
     */
    private LockerInterface $locker;

    /**
     * @param ThingRepositoryInterface $thingRepository
     * @param LockerInterface $locker
     */
    public function __construct(
        ThingRepositoryInterface $thingRepository,
        LockerInterface $locker
    ) {
        $this->thingRepository = $thingRepository;
        $this->locker = $locker;
    }

    /**
     * @inheritDoc
     */
    // Вообще тут нарушение CQS, но лучшего решения пока нет
    public function provide(string $name): Thing
    {
        $thing = $this->thingRepository->findOneByName($name);

        $this->locker->lock($thing->getId());

        return $thing;
    }
}
