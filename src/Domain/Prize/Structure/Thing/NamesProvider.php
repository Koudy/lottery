<?php

namespace App\Domain\Prize\Structure\Thing;

use App\Domain\Prize\Structure\Thing\Interfaces\ThingNamesProviderInterface;
use App\Domain\Repository\Interfaces\ThingRepositoryInterface;

class NamesProvider implements ThingNamesProviderInterface
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
