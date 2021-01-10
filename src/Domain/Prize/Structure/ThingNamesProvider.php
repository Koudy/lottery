<?php

namespace App\Domain\Prize\Structure;

use App\Domain\Prize\Structure\Interfaces\ThingNamesProviderInterface;
use App\Domain\Repository\Interfaces\ThingRepositoryInterface;

class ThingNamesProvider implements ThingNamesProviderInterface
{
    /**
     * @var ThingRepositoryInterface
     */
    private ThingRepositoryInterface $thingRepositoryInterface;

    /**
     * @param ThingRepositoryInterface $thingRepositoryInterface
     */
    public function __construct(ThingRepositoryInterface $thingRepositoryInterface)
    {
        $this->thingRepositoryInterface = $thingRepositoryInterface;
    }

    /**
     * @inheritDoc
     */
    public function provide(): array
    {
        return $this->thingRepositoryInterface->getUniqueNamesWithEmptyPrizeId();
    }
}
